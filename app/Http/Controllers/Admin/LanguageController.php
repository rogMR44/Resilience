<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.languages.index',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = [
            'green'=>'Green',
            'blue'=>'Blue',
            'yellow'=>'Yellow',
            'red'=>'Red',
            'purple'=>'Purple',
            'orange'=>'Orange',
            'indigo'=>'Indigo',
        ];
        return view('admin.languages.create',compact('colors'));
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
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required'
        ]);
        $language = Language::create($request->all());
        return redirect()->route('admin.languages.edit',compact('language'))->with('info','Language created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        return view('admin.languages.show',compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        $colors = [
            'green'=>'Green',
            'blue'=>'Blue',
            'yellow'=>'Yellow',
            'red'=>'Red',
            'purple'=>'Purple',
            'orange'=>'Orange',
            'indigo'=>'Indigo',
        ];
        return view('admin.languages.edit',compact('language'),compact('colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:languages,slug,$language->id",
            'color' => 'required'
        ]);
        $language->update($request->all());
        return redirect()->route('admin.languages.edit',$language)->with('info','Language edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->route('admin.languages.index')->with('info','Language deleted successfully');
    }
}
