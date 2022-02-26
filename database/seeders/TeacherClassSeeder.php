<?php

namespace Database\Seeders;

use App\Models\TeacherClass;
use App\Models\ReservedClass;
use Illuminate\Database\Seeder;

class TeacherClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $posts = TeacherClass::factory(100)->create();
        // $reservedClasses = ReservedClass::factory(50)->create();    
        $class1 = TeacherClass::create([
            'teacher_id'=>'2',
            'class_date'=>'2001-05-21',            
            'class_start'=>'15:00:00',          
            'class_end'=>'15:30:00',
            'class_link'=>'Hello join a profesional',
            'status'=>'1',            
         ]);   

         $class2 = TeacherClass::create([
            'teacher_id'=>'2',
            'class_date'=>'2001-05-21',            
            'class_start'=>'15:30:00',          
            'class_end'=>'16:00:00',
            'class_link'=>'Hello join a profesional',
            'status'=>'1',            
         ]);      
         
         $class3 = TeacherClass::create([
            'teacher_id'=>'2',
            'class_date'=>'2001-05-21',            
            'class_start'=>'16:30:00',          
            'class_end'=>'17:00:00',
            'class_link'=>'Hello join a profesional',
            'status'=>'1',            
         ]);        

         $class4 = TeacherClass::create([
            'teacher_id'=>'2',
            'class_date'=>'2001-05-21',            
            'class_start'=>'17:30:00',          
            'class_end'=>'18:00:00',
            'class_link'=>'Hello join a profesional',
            'status'=>'1',            
         ]);        
    }
}
