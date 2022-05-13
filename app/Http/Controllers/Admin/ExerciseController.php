<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Support\Facades\Storage;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = Exercise::all();
        // return $exercises;
        return view('admin.exercise_guide.index',compact('exercises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ExerciseCategory::pluck('name','id');
        return view('admin.exercise_guide.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        return $request;

        $request->validate([
            'name'=>'required',
            'slug' => 'required',            
        ]);

        $exercise = Exercise::create($request->all());        

        if($request->file('file_x')){
            $url = Storage::put('exerciseImageX',$request->file('file_x'));            
            $exercise->imageX()->create([
                'url' => $url
            ]);
        }

        if($request->file('file_y')){
            $url = Storage::put('exerciseImageY',$request->file('file_y'));            
            $exercise->imageY()->create([
                'url' => $url
            ]);
        }

        if($request->file('file_z')){
            $url = Storage::put('exerciseImageZ',$request->file('file_z'));            
            $exercise->imageZ()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.exercise_guide.edit',$exercise)->with('info','Exercise created  successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
        $categories = ExerciseCategory::pluck('name','id');
        return view('admin.exercise_guide.edit',compact('exercise','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercise $exercise)
    {        
        $request->validate([
            'name'=>'required',
            'slug' => 'required',            
        ]);

        // return $request;

        $exercise->update($request->all());
        

        if ($request->file('file_x')) {
            $url = Storage::put('exerciseImageX', $request->file('file_x'));
            if ($exercise->imageX){
                // borrar la imagen que exista primero
                Storage::delete($exercise->imageX->url);
                $exercise->imageX->update([
                    'url' => $url
                ]);
            }
            else{
                $exercise->imageX()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->file('file_y')) {
            $url = Storage::put('exerciseImageY', $request->file('file_y'));
            if ($exercise->imageY){
                // borrar la imagen que exista primero
                Storage::delete($exercise->imageY->url);
                $exercise->imageY->update([
                    'url' => $url
                ]);
            }
            else{
                $exercise->imageY()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->file('file_z')) {
            $url = Storage::put('exerciseImageZ', $request->file('file_z'));
            if ($exercise->imageZ){
                // borrar la imagen que exista primero
                Storage::delete($exercise->imageZ->url);
                $exercise->imageZ->update([
                    'url' => $url
                ]);
            }
            else{
                $exercise->imageZ()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.exercise_guide.edit',$exercise)->with('info','Exercise information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return redirect()->route('admin.exercise_guide.index')->with('info','Exercise deleted successfully');
    }
}
