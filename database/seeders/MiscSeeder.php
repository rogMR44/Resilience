<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Exercise;
use App\Models\Tag;
use App\Models\ExerciseCategory;

class MiscSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
            'name'=>'nutricion',
            'slug'=>'nutricion',                   
         ]);  

        $exercise_category = ExerciseCategory::create([
           'name'=>'brazo',
           'slug'=>'brazo',                   
        ]); 

        $exercise = Exercise::create([
            'name' => 'Curl',
            'slug' => 'curl',
            'description' => 'Lorem ipsum',
            'benefits' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'execution' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'user_id' => '1',
            'category_id' => '1',
        ]);
         
        $tag = Tag::create([
            'name'=>'ejercicio',
            'slug'=>'ejercicio',       
            'color'=>'blue',
        ]);  
         
        $tag2 = Tag::create([
            'name'=>'salud',
            'slug'=>'salud',       
            'color'=>'green',
        ]);
        
        

        // $language = Language::create([
        //     'name'=>'spanish',
        //     'slug'=>'spanish',
        //     'color'=>'spanish',     
        // ]);        

        // $product1 = Product::create([
        //     'name' => 'Plan 1',
        //     'description' => '',
        //     'price' => ''
        // ]);
    }
}
