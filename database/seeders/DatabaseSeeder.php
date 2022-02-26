<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');
        Storage::deleteDirectory('avatars');
        Storage::makeDirectory('avatars');
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');
        $this->call(LaratrustSeeder::class);
        $this->call(UserSeeder::class);        
        $this->call(MiscSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(TeacherClassSeeder::class);       
        Product::factory(2)->create(); 
        // Category::factory(4)->create();
        // Tag::factory(8)->create();
        // Language::factory(6)->create();
        // $this->call(TeacherClassSeeder::class);
    }
}
