<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Admin extends Controller
{
    function index(){        
        $asesorados = User::where('type',3)->latest('id')->paginate(10);
        return view('admin.asesorados',compact('asesorados'));
    }
}