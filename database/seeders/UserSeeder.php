<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\UserImage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
           'name'=>'admin',
           'email'=>'admin@email.com',
           'password'=>bcrypt('12345678'),           
        ]);
        $admin->attachRole('admin');
        $adminimg = UserImage::factory(1)->create([
            'imageable_id'=>$admin->id,
            'imageable_type'=>User::class
        ]);

        $teacher1 = User::create([
            'name'=>'teacher',
            'email'=>'teacher@email.com',
            'password'=>bcrypt('12345678'),
            'isteacher'=>('2'),          
            'realname'=>'Roger',
            'introduction'=>'Hello join a profesional',
            'about'=>'Hello this me me',
            'class_link'=>'https://celem.mx/',
         ]);
        $teacher1->attachRole('teacher');
        $teacherimg = UserImage::factory(1)->create([
            'imageable_id'=>$teacher1->id,
            'imageable_type'=>User::class
        ]);

        $student1 = User::create([
            'name'=>'student',
            'email'=>'student@email.com',
            'password'=>bcrypt('12345678'),  
            'num_classes'=>'2',         
        ]);
        $student1->attachRole('student');   
        $studentimg = UserImage::factory(1)->create([
            'imageable_id'=>$student1->id,
            'imageable_type'=>User::class
        ]);
    }
}
