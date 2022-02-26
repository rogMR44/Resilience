<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class DashboardController extends Controller
{
   public function index()
   {
     if(Auth::user()->hasRole('admin')){
         return redirect()->route('adminadd');
     }

     elseif(Auth::user()->hasRole('teacher')){         
        $teacher = Auth::user();
        $reservedClasses = array(
            'list'=> DB::table('reserved_classes')
            ->Join('teacher_classes','teacher_classes.id','=','teacher_class_id')
            ->where('reserved_classes.teacher_id',$teacher->id)
            ->get());
            // return $reservedClasses;
            return view('teacherdash',$teacher,$reservedClasses);
     }

     elseif(Auth::user()->hasRole('student')){
         $student = Auth::user();
         $studentClasses = array(
            'list' => DB::table('reserved_classes')
            ->Join('teacher_classes','teacher_classes.id','=','teacher_class_id')
            ->where('student_id',$student->id)
            ->get());
            // return $studentClasses;
         return view('userdash',$studentClasses);
     }
   }

   public function myprofile()
   {
    return view('myprofile');
   }
}
