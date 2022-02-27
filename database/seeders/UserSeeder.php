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
            'name'=>'entrenador',
            'email'=>'entrenador@email.com',
            'password'=>bcrypt('12345678'),
         ]);
        $teacher1->attachRole('entrenador');
        $teacherimg = UserImage::factory(1)->create([
            'imageable_id'=>$teacher1->id,
            'imageable_type'=>User::class
        ]);

        $student1 = User::create([
            'name'=>'asesorado',
            'email'=>'asesordo@email.com',
            'password'=>bcrypt('12345678'),   
        ]);
        $student1->attachRole('asesorado');
        $studentimg = UserImage::factory(1)->create([
            'imageable_id'=>$student1->id,
            'imageable_type'=>User::class
        ]);
    }
}
