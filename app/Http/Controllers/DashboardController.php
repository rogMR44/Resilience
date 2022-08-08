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
        return view('admindash');
     }

     elseif(Auth::user()->hasRole('entrenador')){         
        $teacher = Auth::user();
        return view('teacherdash');
     }

     elseif(Auth::user()->hasRole('asesorado')){
        $student = Auth::user();        
        return view('userdash');
     }
   }

   public function myprofile()
   {
    return view('myprofile');
   }
}
