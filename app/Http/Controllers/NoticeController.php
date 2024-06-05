<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notice;

class NoticeController extends BaseController{
    
    public function index(){
        
        $roleId = Auth::user()->role_id;
       $instituteId = Auth::user()->institute_id;
        $currentDate = date('d-m-Y');

       // Conditional query based on the role ID
        if ($roleId == 1) {
            // For role ID 1, show all notices with an empty institut_id
            $notices = Notice::whereNull('institute_id')->paginate(10);
        } else {
            // For other roles, show all notices with a non-empty institute_id
            $notices = Notice::where('institute_id',$instituteId)->paginate(10);
        }

        // $notices = Notice::paginate(10);

        // dd($notices);

        return view('notices.index',compact('notices','currentDate'));

    }

     /**
     * Show the form for creating a new resource.
     */
    public function create(){
        
        $instituteId = Auth::user()->institute_id;


        return view('notices.create',compact('instituteId'));
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        
        // dd($request);

        $request->validate([
             'title' => ['required'],
             'message' => ['required'],
             'start_date' => ['required'],
             'end_date' => ['required']
        ]);   

        $active = $request->has('active') ? 1 : 0;

        $notce = Notice::create([
            'institute_id' => $request->input('institute_id'),
            'title' => $request->input('title'),
            'message' => $request->input('message'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'active' => $active,
        ]);

        return redirect()->route('notices.index');

    }

    /**
     * Display the specified resource.
     */
   /**
     * Display the specified resource.
     */
    public function show(string $id){

        $notice = Notice::findOrFail($id);


        // dd($classDetail);    
        return view('notices.show',compact('notice'));
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $notice = Notice::findOrFail($id);

       return view('notices.edit',compact('notice'));
   }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
      
        $notice = Notice::find($id);
 
        // dd($request);
 
        if (!$notice) {
             return redirect()->route('notices.index')->with('error', 'Notice not found.');
        }
        $active = $request->has('active') ? 1 : 0;

        $data = $request->all();
        $data['active'] =  $active;
        
        $notice->update($data); 
 
        //  $notice->update([
        //      'name' => $request->input('name'),
        //      'active' => $request->input('active')
        //  ]);
 
         return redirect()->route('notices.index');
     }

}
