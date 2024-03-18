<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
       $pageTitle = "Users";
        
        $usersQuery = User::with(['roles','departments']);

        $users = $usersQuery->paginate(20);

        // dd($users);

       return view('users.index',compact('pageTitle','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $pageTitle = "Add";

        $roles = Role::all()->where('active',true);
        $departments = Department::all()->where('active',true);

        // dd($roles);

        return view('users.create',compact('pageTitle','roles','departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
            
         dd($request);   
         $request->validate([
            'role_id'=>['required'],
            'name'=>['required'],
            'email'=>['required'],
            'password'=>['required'],
            'contact_no'=>['required'],
        ]);
        
        $users = User::create([
            'role_id' => $request->input('role_id'),
            'department_id'=> $request->input('department_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'contact_no' => $request->input('contact_no'),
            'alternat_no' => $request->input('alternat_no'),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'active' => $request->input('active'),
        ]);  

         /*Upload Files*/
         if ($request->hasFile('image_file')) {
           
            $image = $request->file('image_file');   
            $folder = 'files/users/image_file/'.$users->id;
            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            $users->image_file = $image->getClientOriginalName();
         } 

         $users->save();

         return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $pageTitle = 'Users';
        $user = User::find($id);

        // dd($user);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }

        // You can pass the data to a view and display it
        return view('users.show', compact('user','pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $user = User::findOrFail($id);   

        $roles = Role::all()->where('active',true);
        $departments = Department::all()->where('active',true);


        return view('users.edit',compact('user','roles','departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
       }

       $user->update([
            'role_id' => $request->input('role_id'),
            'department_id'=> $request->input('department_id'),
            'name' => $request->input('name'),
            'contact_no' => $request->input('contact_no'),
            'alternat_no' => $request->input('alternat_no'),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'active' => $request->input('active'),
        ]);

       /*Upload Files*/
         if ($request->hasFile('image_file')) {
           
            $image = $request->file('image_file');   
            $folder = 'files/users/image_file/'.$user->id;
            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            $user->image_file = $image->getClientOriginalName();
         }
      
       $user->save();

       return redirect()->route('users.index');
    
    }

    /*Change Password*/
    public function change_password(){
        $pageTitle = "Change Password";

       return view('users.change_password',compact('pageTitle'));
    }

    public function update_password(Request $request)
    {
        // dd($request);

        // Validate the form data
        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        // Get the authenticated user
        $user = Auth::user();
        
        // Verify current password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'The current password is incorrect.']);
        }

        // Compare new password and confirm password
        if ($request->new_password !== $request->confirm_password) {
            return back()->withErrors(['confirm_password' => 'The new password and confirm password do not match.']);
        }

        // Update password
        // $user->password = Hash::make($request->new_password);
        $user->password = bcrypt($request->new_password);

        $user->save();

        Session::flash('success', 'Password changed successfully!');

        return redirect()->route('users.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        //
    }

    


}
