<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\Board;
use App\Models\Medium;
use App\Models\Stream;
use App\Models\InstituteType;
use App\Models\User;

class InstitutesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $pageTitle = "Institute";
        $institutes = Institute::all()->where('its_college','0');

        // dd($institutes);

        return view('institutes.index',compact('pageTitle','institutes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $pageTitle = "Add";

        $boards = Board::all()->where('active',true);
        $mediums = Medium::all()->where('active',true);
        // $streams = Stream::all()->where('active',true);
        $instituteTypes = InstituteType::all()->where('active',true);

        $latestInstituteId = Institute::latest()->value('id');
        $latestCodeId = (!empty($latestInstituteId)) ? str_pad($latestInstituteId + 1, 2, '0', STR_PAD_LEFT) : "01";

        return view('institutes.create',compact('pageTitle','boards','mediums','instituteTypes','latestCodeId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            
           // dd($request); 

        $request->validate([
            'medium_id'=>['required'],
            'board_id'=>['required'],
            'institute_type_id'=>['required'],
            'name'=>['required'],
            'email'=>['required'],
            'contact_no'=>['required'],
            'principal_name'=>['required'],
        ]);

        $school = Institute::create([
            'medium_id' => $request->input('medium_id'),
            'board_id'=> $request->input('board_id'),
            'institute_type_id'=> $request->input('institute_type_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact_no' => $request->input('contact_no'),
            'code' => $request->input('code'),
            'principal_name' => $request->input('principal_name'),
            'est_since' => $request->input('est_since'),
            'branch' => $request->input('branch'),
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'pin_code' => $request->input('pin_code'),
            'address' => $request->input('address'),
            'morning_shift_start' => $request->input('morning_shift_start'),
            'morning_shift_end' => $request->input('morning_shift_end'),
            'afternoon_shift_start' => $request->input('afternoon_shift_start'),
            'afternoon_shift_end' => $request->input('afternoon_shift_end'),
        ]); 

         /*Upload Files*/
         if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');   
            // dd($image);
            $folder = 'files/school/image_file/'.$school->id;
            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            $school->image_file = $image->getClientOriginalName();
         } 

          $school->save();
         // dd($school);
        return redirect()->route('institutes.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $school = Institute::find($id);

        if (!$school) {
            return redirect()->route('institutes.index')->with('error', 'User not found.');
        }
        $instituteName = ($school->its_college == 1) ? 'College' : 'School';


        /*Users*/
        $users = User::where('institute_id',$id)->where('active',true)->get();

        // dd($users);

         return view('institutes.show', compact('school','instituteName','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
         $school = Institute::findOrFail($id);   

        $boards = Board::all()->where('active',true);
        $mediums = Medium::all()->where('active',true);
        // $streams = Stream::all()->where('active',true);
        $instituteTypes = InstituteType::all()->where('active',true);

        $charector = ($school->its_college == 1) ? 'CL' : 'SC'; 
        $instituteName = ($school->its_college == 1) ? 'College' : 'School';



        return view('institutes.edit',compact('school','boards','mediums','instituteTypes','charector','instituteName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $school = Institute::find($id);
        if (!$school) {
            return redirect()->route('institutes.index')->with('error', 'User not found.');
       }

       $school->update($request->all());

        /*Upload Files*/
         if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');   
            // dd($image);
            $folder = 'files/school/image_file/'.$school->id;
            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            $school->image_file = $image->getClientOriginalName();
         } 

          $school->save();

          if($school->its_college == 1){
            return redirect()->route('colleges');
          }else{
            return redirect()->route('institutes.index');
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        //
    }

    /*College Method Start Here*/
    public function colleges(){
        $pageTitle = "Institute";
        $institutes = Institute::all()->where('its_college','1');

        return view('institutes.colleges',compact('pageTitle','institutes'));
    }

    /*Add College*/
    public function add_college(){
        $pageTitle = "Add";

        $boards = Board::all()->where('active',true);
        $mediums = Medium::all()->where('active',true);
        // $streams = Stream::all()->where('active',true);
        $instituteTypes = InstituteType::all()->where('active',true);

        $latestInstituteId = Institute::latest()->value('id');
        $latestCodeId = (!empty($latestInstituteId)) ? str_pad($latestInstituteId + 1, 2, '0', STR_PAD_LEFT) : "01";

        return view('institutes.add_college',compact('pageTitle','boards','mediums','instituteTypes','latestCodeId'));
    
    }

    public function college_store(Request $request){
        $request->validate([
            'medium_id'=>['required'],
            'board_id'=>['required'],
            'institute_type_id'=>['required'],
            'name'=>['required'],
            'email'=>['required'],
            'contact_no'=>['required'],
            'principal_name'=>['required'],
        ]);

        $school = Institute::create([
            'its_college' => 1,
            'medium_id' => $request->input('medium_id'),
            'board_id'=> $request->input('board_id'),
            'institute_type_id'=> $request->input('institute_type_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact_no' => $request->input('contact_no'),
            'code' => $request->input('code'),
            'principal_name' => $request->input('principal_name'),
            'est_since' => $request->input('est_since'),
            'branch' => $request->input('branch'),
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'pin_code' => $request->input('pin_code'),
            'address' => $request->input('address'),
            'morning_shift_start' => $request->input('morning_shift_start'),
            'morning_shift_end' => $request->input('morning_shift_end'),
            'afternoon_shift_start' => $request->input('afternoon_shift_start'),
            'afternoon_shift_end' => $request->input('afternoon_shift_end'),
        ]); 

         /*Upload Files*/
         if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');   
            // dd($image);
            $folder = 'files/school/image_file/'.$school->id;
            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            $school->image_file = $image->getClientOriginalName();
         } 

          $school->save();
         // dd($school);
        return redirect()->route('colleges');

    }

}
