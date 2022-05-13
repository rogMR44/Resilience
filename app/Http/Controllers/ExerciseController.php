<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\ExerciseCategory;

class ExerciseController extends Controller
{
    public function index(){
        $exercises = Exercise::all();
        $categories = ExerciseCategory::all();       
        return view('exercise_guide.index',compact('exercises','categories'));
    }

    public function show(Exercise $exercise){        
        return view('exercise_guide.show',compact('exercise'));
    }
    
    public function category(ExerciseCategory $category){        
        $categories = ExerciseCategory::all();
        $exercises = Exercise::where('category_id',$category->id)                        
                        ->latest('id')
                        ->paginate(4);
        return view('exercise_guide.category',compact('exercises','category','categories'));
    }
}
