<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminUserAdd extends Controller
{
    //
    function index(){
        // $data=array(
        //     'list'=>DB::table('users')->get()
        // );
        $data = array(
            'list'=> DB::table('users')
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->get(['users.id','users.name','users.email','roles.display_name'])
        );
        return view('admin.adminuseradd',$data);
    }

    function adduser(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);
        $user = User::create([ 
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
       ]);
       $user->attachRole('teacher');
       if($user){
           return back()->with('success','Usuario creado correctamente');
       }
       else{
        return back()->with('error','Error al crear usuario');
       }
    }

    function edit($id){
        $row = DB::table('users')
                    ->where('id',$id)
                    ->first();
        $data = [
            'Info'=> $row
        ];
        return view('admin.adminuseredit',$data);
        // return $data;
    }

    function updateuser(Request $request){
        $updating = DB::table('users')
                    ->where('id',$request->input('userid'))
                    ->update([
                        'name'=>$request->input('name'),
                        'email'=>$request->input('email')
                    ]);
                    return redirect('admin/adminuseradd');
    }

    function updateuserpw(Request $request){
        $updating = DB::table('users')
                    ->where('id',$request->input('userid'))
                    ->update([
                        'password'=>Hash::make($request->input('password'))
                    ]);
                    return redirect('admin/adminuseradd');
    }

    function delete($id){
        $delete = DB::table('users')
                    ->where('id',$id)
                    ->delete();
        return redirect('admin/adminuseradd');
    }
}