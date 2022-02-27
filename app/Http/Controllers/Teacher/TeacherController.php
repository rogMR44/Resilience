<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\TeacherClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as AImage;
use Illuminate\Support\Facades\Storage;
use PhpParser\Builder\Class_;

class TeacherController extends Controller
{
    function index()
    {        
        return view('teacher.profile', array('user' => Auth::user()));
    }
    public function updatetavatar(Request $request, User $user)
    {
        $user->update($request->all());
        if ($request->file('file')) {
            $url = Storage::put('avatars', $request->file('file'));
            if ($user->userImage) {
                // borrar la imagen que exista primero
                Storage::delete($user->userImage->url);
                $user->userImage->update([
                    'url' => $url
                ]);
            } else {
                $user->userImage()->create([
                    'url' => $url
                ]);
            }
        }
        return redirect()->route('teacher.profile', $user);
    }

    function updatetprofile(Request $request)
    {
        $updating = DB::table('users')
            ->where('id', $request->input('userid'))
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]);
        return redirect('teacher/profile');
    }

    function updatetpw(Request $request)
    {
        // return $request;
        $user = Auth::user();
        $request->validate([
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|confirmed|min:8'
        ]);
        if (Hash::check($request->old_password, $user->password)) {
            $updating = DB::table('users')
                ->where('id', $request->input('userid'))
                ->update([
                    'password' => Hash::make($request->input('password'))
                ]);
            return redirect('teacher/profile')->with('message', 'Password updated successfully');
        } else {
            return redirect()->back()->with('error', 'Given password does not match');
        }
    }

    function updatedetails(Request $request)
    {
        $user = Auth::user();
        $realname = $request->realname;
        $intro = $request->introduction;
        $about = $request->about;
        $class_link = $request->class_link;
        $updating = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'realname' => $realname,
                'class_link' => $class_link,
                'introduction' => $intro,
                'about' => $about
            ]);
        if ($request->languages) {
            $user->languages()->sync($request->languages);
        }
        $updating = DB::table('teacher_classes')
            ->where('teacher_id', Auth::user()->id)
            ->update([
                'class_link' => $class_link,
            ]);
        return redirect('teacher/profile');
        // echo $request->input('user_id');
        // echo $class_link;
        // echo $realname;
        // echo $intro;
        // echo $about;
        // return $request->languages;
    }

    public function show($id)
    {
        $student = Auth::user();
        $classInfo = array(
            'list' => DB::table('reserved_classes')
                ->Join('teacher_classes', 'teacher_classes.id', '=', 'teacher_class_id')
                ->where('teacher_class_id', $id)
                ->where('status', '1')
                ->get()
        );
        return view('student.classinfo', $classInfo);
        // return $classInfo;
        // return $id;
    }

    public function allClasses()
    {
        $teacher = Auth::user();
        $allClasses = array(
            'list' => DB::table('teacher_classes')
                ->get(['id', 'teacher_id', 'class_date', 'class_start', 'class_end', 'status'])
                ->where('teacher_id', $teacher->id)
        );
        // return $allClasses;
        return view('teacher.classes.index', $teacher, $allClasses);
    }


    public function createclass()
    {
        $teacher = Auth::user();
        // return $teacher;
        return view('teacher.classes.create');
    }

    public function classcreate(Request $request)
    {
        //Varios datos se mantienen, solo 3 campos se irán recorriendo
        $teacher = Auth::user();
        $class_link = $teacher->class_link;
        //Es importante que para que guarde adecuadamente todos los campos de la tabla esten llenos
        //Para el límite del for yo agarro el class_date, pero podrías usar start o end
        for ($i = 0; $i < count($request->class_date); $i++) {
            $class = TeacherClass::create([
                'teacher_id' => $teacher->id,
                'class_date' => $request->class_date[$i],
                'class_start' => $request->class_start[$i],
                'class_end' => $request->class_end[$i],
                'realname' => $teacher->realname,
                'status' => '1',
                'class_link' => $class_link
            ]);
        }
        return redirect()->route('teacher.allclasses');
        // return $request;
    }

    public function editclass(TeacherClass $id)
    {
        // return $id;
        return view('teacher.classes.edit', compact('id'));
    }

    public function classedit(Request $request)
    {
        // return $request;               
        $teacher = Auth::user();
        $class_link = $teacher->class_link;
        $updating = DB::table('teacher_classes')
            ->where('id', $request->class_id)
            ->update([
                'teacher_id' => $teacher->id,
                'class_date' => $request->class_date,
                'class_start' => $request->class_start,
                'class_end' => $request->class_end,
                'realname' => $teacher->realname,
                'status' => '1',
                'class_link' => $class_link
            ]);
        return redirect()->route('teacher.allclasses');
    }

    public function deleteclass($id)
    {
        // return $id;        
        $delete = DB::table('teacher_classes')
            ->where('id', $id)
            ->delete();
        return redirect()->route('teacher.allclasses');
    }

    public function testing(Request $request)
    {
        //return $request->class_start[];
    }
}
