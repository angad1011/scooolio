<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TeacherActivation;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
   
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){

        $credentials = $request->only('email', 'password');

        // Check if the user exists and is active
        $user = User::where('email', $credentials['email'])
            ->where('active', true)
            ->first();
            
        if ($user && Auth::attempt($credentials)) {
            return redirect()->route('dashboards.index');
        }

        return back()->withErrors(['email' => 'Username Or Password Not Match!']);
    }

    public function singUp(){
     return view('auth.register');
    }

    public function register(Request $request){
        // dd($request->all);
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:3',
        ]);

        // Create a new user
        $user = User::create([
            'role_id' =>'1',
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Log in the new user
        auth()->login($user);

        return redirect()->route('dashboards.index');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }

    public function teacherLogin(Request $request){
        
         $teacher = TeacherActivation::where('username',$request->username)->first();

         // echo $teacher;exit;

         if (!$teacher || !Hash::check($request->password, $teacher->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
     
        $token = $teacher->createToken('my-app-token')->plainTextToken;

        $response = [
            'teacher' => $teacher,
            'token' => $token
        ];
    
         return response($response, 201);
        //  dd($teacher);
    }

    /*Teacher Forget Password API*/
    public function teacherForgetPassword(Request $request){

        $teacherActivation = TeacherActivation::where('username', $request->username)->first();

        if (!$teacherActivation) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // print_r($teacher);
        $teacherId = $teacherActivation->teacher_id;

        /*Teacher Details*/
        $teacher = Teacher::find($teacherId);


        $newPassword = Str::random(10); // Generate a random password
        $teacherActivation->password = bcrypt($newPassword);
        $teacherActivation->save();

         // Send email with new password
        \Mail::raw("Your new password is: $newPassword", function($message) use ($teacher) {
            $message->to($teacher->email)->subject('New Password');
        });

         return response()->json(['message' => 'New password sent to your email'], 200);

        // var_dump($teacher);

    }

  



}
