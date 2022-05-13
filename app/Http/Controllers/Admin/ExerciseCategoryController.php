<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExerciseCategory;
use Illuminate\Http\Request;

class ExerciseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercise_categories = ExerciseCategory::all();
        return view('admin.exercise_categories.index',compact('exercise_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exercise_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug' => 'required',            
        ]);
        $exerciseCategory = ExerciseCategory::create($request->all());
        return redirect()->route('admin.exercise_guide_category.edit',$exerciseCategory)->with('info','Exercise category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ExerciseCategory $exercise_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ExerciseCategory $exerciseCategory)
    {
        return view('admin.exercise_categories.edit',compact('exerciseCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExerciseCategory $exerciseCategory)
    {
        $request->validate([
            'name'=>'required',
            'slug' => 'required',            
        ]);
        $exerciseCategory->update($request->all());
        return redirect()->route('admin.exercise_guide_category.edit',$exerciseCategory)->with('info','Exercise category information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExerciseCategory $exerciseCategory)
    {
        $exerciseCategory->delete();
        return redirect()->route('admin.exercise_guide_category.index')->with('info','Exercise category deleted successfully');
    }
}
