<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Measurement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeasurementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Auth::user();
        // $measurements = Measurement::all();
        $measurements = Measurement::where('student_id',$student->id)->latest('id')->get();
        // return $measurements;
        return view('student.measurements.index',compact('student','measurements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $now = Carbon::now();
        // return $now;
        return view('student.measurements.create',compact('now'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $measurement = Measurement::create($request->all());
        return redirect()->route('student.measurements.edit',$measurement)->with('info','Registro de medidas agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Measurement $measurement)
    {
        // return $measurement;
        return view('student.measurements.show',compact('measurement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Measurement $measurement)
    {
        // return $measurement;
        $now = Carbon::now();        
        return view('student.measurements.edit',compact('measurement','now'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measurement $measurement)
    {
        $measurement->update($request->all());
        return redirect()->route('student.measurements.edit',$measurement)->with('info','Registro de medidas agregado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measurement $measurement)
    {
        $measurement->delete();
        return redirect()->route('student.measurements.index')->with('info','Registro eliminado con exito');
    }
}
