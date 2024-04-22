<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller{
    
    public function index(){
       
        $notices = Notice::all();
        return view('notices.index',compact('notices'));

    }

     /**
     * Show the form for creating a new resource.
     */
    public function create(){

        return view('notices.create');
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

        $notce = Notice::create([
            'title' => $request->input('title'),
            'message' => $request->input('message'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'active' => $request->input('active'),
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

        $notice->update($request->all()); 
 
        //  $notice->update([
        //      'name' => $request->input('name'),
        //      'active' => $request->input('active')
        //  ]);
 
         return redirect()->route('notices.index');
     }

}
