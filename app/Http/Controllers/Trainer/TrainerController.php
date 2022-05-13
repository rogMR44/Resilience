<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trainer.profile', array('user'=>Auth::user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updatetavatar(Request $request, User $user){
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
        return redirect()->route('trainer.profile',$user);
    }

    function updatetprofile(Request $request){
        $updating = DB::table('users')
                    ->where('id',$request->input('userid'))
                    ->update([
                        'name'=>$request->input('name'),
                        'email'=>$request->input('email'),                        
                    ]);
                    return redirect('trainer/profile')->with('message1','Info updated successfully');
    }

    function updatetpw(Request $request){
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
                        return redirect('trainer/profile')->with('message2','Password updated successfully');
        }
        else{
            return redirect()->back()->with('error','Given password does not match');
        }

    }

}
