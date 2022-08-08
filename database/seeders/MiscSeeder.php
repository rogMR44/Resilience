<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Exercise;
use App\Models\Tag;
use App\Models\ExerciseCategory;
use App\Models\Measurement;

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

        $medida = Measurement::create([
            'cuello'=>'10',
            'pecho'=>'10',
            'hombro'=>'10',
            'bicep_derecho_r'=>'10',
            'bicep_izquierdo_r'=>'10',
            'bicep_derecho_c'=>'10',
            'bicep_izquierdo_c'=>'10',
            'antebrazo_derecho'=>'10',
            'antebrazo_izquierdo'=>'10',
            'muneca_derecha'=>'10',
            'muneca_izquierda'=>'10',
            'cintura'=>'10',
            'gluteo'=>'10',
            'muslo_derecho'=>'10',
            'muslo_izquierdo'=>'10',
            'pantorilla_derecha'=>'10',
            'pantorilla_izquierda'=>'10',
            'peso'=>'10',
            'estatura'=>'10',
            'date_recorded'=>'2022/10/10',
            'student_id'=>'3',
        ]);
    }
}
