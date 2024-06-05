<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardsController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
     public function index(){
        $pageTitle = "Board";
        $boards = Board::all();
        return view('boards.index',compact('pageTitle','boards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $pageTitle = "Add";

        return view('boards.create',compact('pageTitle'));
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

        $board = Board::create([
            'name' => $request->input('name'),
            'active' => (!empty($active)) ? 1 : 0,
        ]);

        return redirect()->route('boards.index');

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
        $board = Board::findOrFail($id);

         return view('boards.edit',compact('board'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
         $board = Board::find($id);

        if (!$board) {
            return redirect()->route('boards.index')->with('error', 'Board not found.');
        }

        $active =  (!empty($request->input('active'))) ? $request->input('active') : '';

        $board->update([
            'name' => $request->input('name'),
            'active' => (!empty($active)) ? 1 : 0,
        ]);

          return redirect()->route('boards.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
