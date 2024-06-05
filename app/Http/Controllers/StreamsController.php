<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stream;

class StreamsController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
   public function index(){
        $pageTitle = "Stream";
        $streams = Stream::all();
        return view('streams.index',compact('pageTitle','streams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $pageTitle = "Add";

        return view('streams.create',compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // dd($request);

        $request->validate([
             'name' => ['required']
        ]); 

        /*Active*/
        $active =  (!empty($request->input('active'))) ? $request->input('active') : '';

        $stream = Stream::create([
            'name' => $request->input('name'),
            'active' => (!empty($active)) ? 1 : 0,
        ]);

        return redirect()->route('streams.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
         $stream = Stream::findOrFail($id);

         return view('streams.edit',compact('stream'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
         $stream = Stream::find($id);

        if (!$stream) {
            return redirect()->route('streams.index')->with('error', 'Stream not found.');
        }

        $active =  (!empty($request->input('active'))) ? $request->input('active') : '';

        $stream->update([
            'name' => $request->input('name'),
            'active' => (!empty($active)) ? 1 : 0,
        ]);

          return redirect()->route('streams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
