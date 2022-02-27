<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Language;
use App\Models\TeacherClass;
use App\Models\Product;

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
