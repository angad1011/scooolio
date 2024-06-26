<?php

namespace App\Http\Controllers;

use App\Mail\StudentActivationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use App\Models\Students;
use App\Models\LearnSpace;
use App\Models\AcademicYear;
use App\Models\StudentAttendace;



class StudentController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        
        $instituteId = Auth::user()->institute_id;
        $students = Students::where('institute_id', $instituteId)->orderBy('id', 'desc')->paginate(10);


        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        
        $instituteId = Auth::user()->institute_id;
        

         // classes
         $classes = LearnSpace::all();

        $emplyeeId = Students::latest()->value('id');
        $emplyeecode = (!empty($emplyeeId)) ? str_pad($emplyeeId + 1, 2, '0', STR_PAD_LEFT) : "01";
        $emplyeecode = 'EMP'.$emplyeecode;

        return view('students.create',compact('instituteId','emplyeecode','classes'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        
        // dump($request);

        $validatedData = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'contact_no' => ['required'],
            'udise_no' => ['required'],
            'gr_no' => ['required'],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'father_name' => ['required'],
            'mother_name' => ['required'],
            'nationality' => ['required'],
            'religion' => ['required'],
            'cast_catogory' => ['required'],
            'pincode' => ['required'],
            'city' => ['required'],
            'address' => ['required']
        ]);

        // dump($validatedData);

        $active = $request->has('active') ? 1 : 0; // Simplified check for 'active' field

        // Create a new Teacher
        $student = Students::create([
            'institute_id' => $request->input('institute_id'),
            'learn_space_id' => $request->input('learn_space_id'),
            'udise_no' => $validatedData['udise_no'],
            'gr_no' => $validatedData['gr_no'],
            'date_of_admission' =>$request->input('date_of_admission'),
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'name' => $validatedData['first_name'].' '.$validatedData['last_name'],
            'email' => $validatedData['email'],
            'contact_no' => $validatedData['contact_no'],
            'alternate_no' => $request->input('alternate_no'),
            'whatsapp' => $request->input('whatsapp'),
            'gender' => $validatedData['gender'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'nationality' => $request->input('nationality'),
            'religion' => $request->input('religion'),
            'cast_catogory' => $request->input('cast_catogory'),
            'blood_group' => $request->input('blood_group'),
            'father_name' => $validatedData['father_name'],
            'mother_name' => $validatedData['mother_name'],
            'parent_email' => $request->input('parent_email'),
            'parent_contact_no' => $request->input('parent_contact_no'),
            'parent_alternat_no' => $request->input('parent_alternat_no'),
            'parent_whatsapp' => $request->input('parent_whatsapp'),
            'qualification' => $request->input('qualification'),
            'father_occupation' => $request->input('father_occupation'),
            'mother_occupation' => $request->input('mother_occupation'),
            'parent_income' => $request->input('parent_income'),
            'pincode' => $request->input('pincode'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'address' =>$request->input('address'),
        ]);

        // dd($student);

         // // Upload Profile Image
         if ($request->hasFile('profile_img')) {
            $image = $request->file('profile_img');
            $folder = 'files/students/profile_img/' . $student->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $student->profile_img = $image->getClientOriginalName();
        } 

        if ($request->hasFile('aadhar_cart')) {
            $image = $request->file('aadhar_cart');
            $folder = 'files/students/aadhar_cart/' . $student->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $student->aadhar_cart = $image->getClientOriginalName();
        } 

        if ($student->save()) {
            return redirect()->route('students.index')->with('success', 'Student added successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to save user.');
        }
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
            
         // dd($id);   

        /*InstitudeIds*/    
        $instituteId = Auth::user()->institute_id;

         /*Student Details*/
        $student = Students::with('learn_spaces')->findOrFail($id);

        // dd($student);
        /*Current Class*/
        $currentClassId = (isset($student->learn_spaces->id) && (!empty($student->learn_spaces->id))) ? $student->learn_spaces->id : '';


        // dd($currentClassId);

        /*Defaul Year*/
        $academicYear = AcademicYear::where(['its_current_year'=>true,'institute_id'=>$instituteId])->first();
        $academicYearId = $academicYear->id;

        /*Student Attendace Percentage*/
        $studentAttendances = StudentAttendace::where(['student_id'=>$id,'learn_space_id'=>$currentClassId,'academic_year_id'=>$academicYearId,'institute_id'=>$instituteId])->get();

        if(!empty($studentAttendances)){
            $totalDays = count($studentAttendances);


            $presentDays = $apsentDay =  $precentPercentage = $absentPercentage = 0;;

            foreach ($studentAttendances as $key => $attendance) {
                
                if ($attendance->attendance_type_id == 1) {
                    $presentDays++;
                }

                if ($attendance->attendance_type_id == 2) {
                    $apsentDay++;
                }

            }

            if($totalDays > 0){
                $precentPercentage = ($presentDays / $totalDays) * 100;
                $precentPercentage = number_format($precentPercentage,2);

                $absentPercentage = ($apsentDay / $totalDays) * 100;    
                $absentPercentage = number_format($absentPercentage,2);
            }

        }

        $activationStatus = (!empty($student->username)) ? 2 : 1;

        return view('students.show',compact('student','absentPercentage','precentPercentage','activationStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $student = Students::findOrFail($id);


        $emplyeecode = (!empty($student->employee_id)) ? $student->employee_id : 'EMP'.$id;

        // classes
         $classes = LearnSpace::all();


        return view('students.edit',compact('student','classes','emplyeecode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        
        $currenDate = date('d M, Y');

        // echo $currenDate;

        $student = Students::find($id);
       
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student not found.');
        }

        $active = $request->has('active') ? 1 : 0; // Simplified check for 'active' field


        $dateOfLiving = ($currenDate == $request->input('date_of_leaving')) ? '' :  $request->input('date_of_leaving');
        // dd($dateOfLiving);
        

        $student->update([
            'learn_space_id' => $request->input('learn_space_id'),
            'udise_no' => $request->input('udise_no'),
            'gr_no' => $request->input('gr_no'),
            'date_of_admission' => $request->input('date_of_admission'),
            'first_name' =>  $request->input('first_name'),
            'last_name' =>  $request->input('last_name'),
            'name' => $request->input('first_name').' '.$request->input('last_name'),
            'email' => $request->input('email'),
            'contact_no' => $request->input('contact_no'),
            'alternate_no' => $request->input('alternate_no'),
            'whatsapp' => $request->input('whatsapp'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date_of_birth'),
            'nationality' => $request->input('nationality'),
            'religion' => $request->input('religion'),
            'cast_catogory' => $request->input('cast_catogory'),
            'blood_group' => $request->input('blood_group'),
            'date_of_leaving' => $dateOfLiving,
            'father_name' => $request->input('father_name'),
            'mother_name' => $request->input('mother_name'),
            'parent_email' => $request->input('parent_email'),
            'parent_contact_no' => $request->input('parent_contact_no'),
            'parent_alternat_no' => $request->input('parent_alternat_no'),
            'parent_whatsapp' => $request->input('parent_whatsapp'),
            'qualification' => $request->input('qualification'),
            'father_occupation' => $request->input('father_occupation'),
            'mother_occupation' => $request->input('mother_occupation'),
            'parent_income' => $request->input('parent_income'),
            'pincode' => $request->input('pincode'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'address' => $request->input('address'),
            'active' => $active, // Simplified 'active' field check
        ]);

          // // Upload Profile Image
          if ($request->hasFile('profile_img')) {
            $image = $request->file('profile_img');
            $folder = 'files/students/profile_img/' . $student->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $student->profile_img = $image->getClientOriginalName();
        }

          if ($request->hasFile('aadhar_cart')) {
            $image = $request->file('aadhar_cart');
            $folder = 'files/students/aadhar_cart/' . $student->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $student->aadhar_cart = $image->getClientOriginalName();
        } 

        if ($student->save()) {
            return redirect()->route('students.index')->with('success', 'Student Update successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to save user.');
        }
    

    }


    public function importStudents(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');

        // dd($file);



        Excel::import(new StudentsImport, $file);

        // return redirect()->back()->with('success', 'Students imported successfully.');
        return redirect()->route('students.index')->with('success', 'Student imported successfully.');
    }


    /*Udpate Student Activation*/
    public function student_activation(Request $request){
        // dd($request);

        $password = $request->input('password');
        $id = $request->input('id');

        Students::updateOrCreate(
            ['id' => $request->input('id')], 
            [
                'username' => $request->input('username'),
                'password' => bcrypt($password)
            ]
        );

        $student = Students::findOrFail($id);

        // $emailData = [];

        $emailData['name'] = $student->name;
        $emailData['password'] = $password; 

        // Send the email
        Mail::to($student->email)->send(new StudentActivationMail($emailData));


        return redirect()->back()->with('success', 'Student Activation Done!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
