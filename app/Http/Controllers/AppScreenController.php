<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AppScreen;

class AppScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $screens = AppScreen::orderBy('order', 'asc')->get();

        return view('app_screens.index',compact('screens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

         return view('app_screens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $instituteId = Auth::user()->institute_id;

        // dd($request);

        $active = $request->has('active') ? 1 : 0; // Simplified check for 'active' field

        $app_screen = AppScreen::create([
            'order' => $request->input('order'),
            'title' => $request->input('title'),
            'active' => $active,
            'description' => $request->input('description'),
        ]);

         if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'files/app_screens/image_file/' . $app_screen->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $app_screen->image_file = $image->getClientOriginalName();
        } 

         if ($app_screen->save()) {
            return redirect()->route('app_screens.index')->with('success', 'AppScreen added successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to save user.');
        }

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

        $screen = AppScreen::findOrFail($id);


        return view('app_screens.edit',compact('screen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
         $screen = AppScreen::find($id);

         // dd($request);

        if (!$screen) {
            return redirect()->route('app_screens.index')->with('error', 'User not found.');
        }  

         $active = $request->has('active') ? 1 : 0; // Simplified check for 'active' field

        $screen->update([
            'order' => $request->input('order'),
            'title' => $request->input('title'),
            'active' => $active,
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'files/app_screens/image_file/' . $screen->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $screen->image_file = $image->getClientOriginalName();
        } 

       if ($screen->save()) {
            return redirect()->route('app_screens.index')->with('success', 'AppScreen Updated successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to save user.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        //
    }

    /*For Add Screens*/
    public function screens(){
         $screens = AppScreen::where('active', true)->orderBy('order', 'asc')->get();



          $screenData = [];
          $count = 0;    
          foreach ($screens as $key => $screen) {
              $screenImage  = $screen->image_file;

             $screen->image_file =  $screenImage ? asset("files/app_screens/image_file/".$screen->id."/".$screenImage."") : asset('dist/images/Image_not_available.png'); 

             $screenData[] = $screen;

          }

         // dd($screens);



         return response()->json([
            'status' => true,
            'screen' => $screenData
         ]);
    }

}
