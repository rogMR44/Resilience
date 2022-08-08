<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodPlanMeal;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMealPlan;
use Illuminate\Support\Facades\Storage;

class FoodPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'food_plan_id' => 'required',
        //     'name' => 'required',
        //     'description' => 'required',
        //     'meal_time' => 'required'
        // ]);
        $meal = FoodPlanMeal::create($request->all());
        // return $foodPlan;
        $user_food_plan = User::where('id',$request->student_id)->first();
        // return $user_food_plan;
        return redirect()->route('admin.a_food_plan.show',compact("user_food_plan"))->with('info','Meal created successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user_food_plan)
    {
        $user_id = $user_food_plan->id;
        // return $user_id;
        // $foodPlanMeals = FoodPlanMeal::where('student_id',$food_plan->id)->get();
        // return $user_food_plan->id;
        $meals = FoodPlanMeal::where('student_id',$user_food_plan->id)->get()->sortBy('meal_time');
        // return $meals;
        $meal_plan_file = UserMealPlan::where('imageable_id',$user_food_plan->id)->get();
        // return $meal_plan_file;
        return view('admin.food_plan.show',compact('user_food_plan','meals','user_id','meal_plan_file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodPlanMeal $meal)
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
    public function update(Request $request, User $user_food_plan)
    {        
        $user_food_plan->update($request->all());
        if ($request->file('file')) {
            $url = Storage::put('mealPlans', $request->file('file'));
            if ($user_food_plan->userMealPlan){
                // borrar la imagen que exista primero
                Storage::delete($user_food_plan->userMealPlan->url);
                $user_food_plan->userMealPlan->update([
                    'url' => $url
                ]);
            }
            else{
                $user_food_plan->userMealPlan()->create([
                    'url' => $url
                ]);
         
            }
        }
        return redirect()->route('admin.a_food_plan.show',compact("user_food_plan"))->with('info','Plan modificado con exito successfully');
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

    public function createMeal($user_id)
    {
        // return $user_id;
        return view('admin.food_plan.create',compact('user_id'));
    }

    public function editMeal(FoodPlanMeal $meal)
    {
        // return $meal;
        return view('admin.food_plan.edit',compact('meal'));
    }

    public function updateMeal(Request $request, FoodPlanMeal $meal)
    {        
        // return $meal;
        $meal->update($request->all());
        $user_food_plan = User::where('id',$request->student_id)->first();
        // return $user_food_plan;
        return redirect()->route('admin.a_food_plan.show',compact("user_food_plan"))->with('info','Meal updated successfully');
    }

    public function deleteMeal(FoodPlanMeal $meal)
    {        
        // return $meal;
        $user_food_plan = User::where('id',$meal->student_id)->first();        
        // return $user_food_plan;
        $meal->delete();
        return redirect()->route('admin.a_food_plan.show',compact("user_food_plan"))->with('info','Meal deleted successfully');
    }

}
