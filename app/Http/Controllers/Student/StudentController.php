<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as AImage;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class StudentController extends Controller
{
    function index(){
        return view('student.profile', array('user'=>Auth::user()));
    }

    public function show($id){
        $student = Auth::user();
        return view('student.classinfo');
        // return $classInfo;
        // return $id;
    }

    public function updateavatar(Request $request, User $user){
        // $user = Auth::user();
        // return $user;
        $user->update($request->all());
        if ($request->file('file')) {
            $url = Storage::put('avatars', $request->file('file'));
            if ($user->userImage){
                // borrar la imagen que exista primero
                Storage::delete($user->userImage->url);
                $user->userImage->update([
                    'url' => $url
                ]);
            }
            else{
                $user->userImage()->create([
                    'url' => $url
                ]);
         
            }
        }
        return redirect()->route('student.profile',$user);
    }

    function updateprofile(Request $request){
        $updating = DB::table('users')
                    ->where('id',$request->input('userid'))
                    ->update([
                        'name'=>$request->input('name'),
                        'email'=>$request->input('email'),                        
                    ]);
                    return redirect('student/profile')->with('message1','Info updated successfully');
    }

    function updatepw(Request $request){
        // return $request;
        $user = Auth::user();
        $request->validate([          
                'old_password' => 'required|string|min:8',
                'password' => 'required|string|confirmed|min:8'
                ]);                
        if (Hash::check($request->old_password,$user->password)){            
            $updating = DB::table('users')
                        ->where('id',$request->input('userid'))
                        ->update([
                            'password'=>Hash::make($request->input('password'))
                        ]);
                        return redirect('student/profile')->with('message','Password updated successfully');
        }
        else{
            return redirect()->back()->with('error','Given password does not match');
        }

    }
}