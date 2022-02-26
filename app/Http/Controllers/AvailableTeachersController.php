<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\ReservedClass;
use App\Models\TeacherClass;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AvailableTeachersController extends Controller
{
    public function index(){
        $languages1 = Language::all();        
        $teachers = User::where('isteacher',2)->latest('id')->paginate(4);
        return view('teachers.index',compact('teachers','languages1'));
    }

    public function show(User $teacher){
        //El usuario actual
        if(Auth::user()){
            $student = Auth::user();
            $teacherClasses = array(
                'list'=> DB::table('teacher_classes')
                ->get(['id','teacher_id','class_date','class_start','class_end','status'])
                ->where('teacher_id',$teacher->id)
                ->where('status','1'),
                'student' => $student->num_classes //Añadir sus clases disponibles
                );
            //return $teacherClasses;
            return view('teachers.show',$teacherClasses,compact('teacher'));
        }
        else{
            $teacherClasses = array(
                'list'=> DB::table('teacher_classes')
                ->get(['id','teacher_id','class_date','class_start','class_end','status'])
                ->where('teacher_id',$teacher->id)
                ->where('status','1'),                
                );
            //return $teacherClasses;
            return view('teachers.show',$teacherClasses,compact('teacher'));
        }
    }

    public function language(Language $language){
        $languages1 = Language::all();
        $teachers = $language->users()->latest('id')->paginate(3);
        return view('teachers.language',compact('teachers','language','languages1'));
    }

    public function reserve(Request $request){
        $student = Auth::user();      
        $num_classes = $request->availableClass;
        // return $num_classes;
        // return $student;  
        // return $request->teacher_id;
        // return count($request->id);

        $counter=count($request->id);
        for ($i=0; $i <= $counter-1; $i++) {      

            // echo($request->id[$i]);

            $reserve = ReservedClass::create([ 
                'teacher_id' => $request->teacher_id,
                'student_id' => $student->id,
                'teacher_class_id' => $request->id[$i]
            ]);
            $updating = DB::table('teacher_classes')
            ->where('id',$request->id[$i])
            ->update([                
                'status' => '2',                        
            ]);
            $update= DB::table('users')
            ->where('id',$student->id)
            ->update([                
                'num_classes' => $num_classes,                        
            ]);
        }
        return redirect()->route('dashboard');

        // return $request->id[0]; get id from sent info 
        // $datos = json_decode($request);
        // foreach ($datos as $key => $value) {
        //     return $value;
        // }
    }    
}