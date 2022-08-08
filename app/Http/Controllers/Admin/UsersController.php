<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodPlan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMealPlan;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_types =[
            'admin' => 'Admin',
            'entrenador' => 'Entrenador',
            'asesorado' => 'Asesorado',            
        ];
        return view('admin.users.create',compact('user_types'));
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
            'name'=>'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'user_type' => 'required',                        
        ]);
        
        switch ($request->user_type) {
            case 'admin':
                $type = 1;
                break;
            case 'entrenador':
                $type = 2;
                break;
            case 'asesorado':
                $type = 3;
                break;
            
        }
        // return $type;
        $user = User::create([ 
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $type,   
        ]);
        // return $request;
        switch ($request->user_type) {
            case 'admin':
                // echo "admin user";
                $user->attachRole('admin');
                return redirect()->route('admin.users.index',$user)->with('info','New administrator created successfully');
                break;
            case 'entrenador':
                // echo "owner user";
                $user->attachRole('entrenador');
                return redirect()->route('admin.users.index',$user)->with('info','New owner created successfully');
                break;
            case 'asesorado':
                // echo "driver user";
                $user->attachRole('asesorado');                
                return redirect()->route('admin.users.index',$user)->with('info','New driver created successfully');
                break;           
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user_types =[
            'admin' => 'Admin',
            'entrenador' => 'Entrenador',
            'asesorado' => 'Asesorado',            
        ];
        return view('admin.users.edit',compact('user_types','user'));
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',            
            'email' => 'required',            
        ]);
        $user->update([ 
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('admin.users.edit',$user)->with('info','User information updated successfully');
    }

    // public function update_password(Request $request, User $user)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('info','User deleted successfully');
    }
}
