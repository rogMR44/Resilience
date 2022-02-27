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
        $this->call(LaratrustSeeder::class);
        $this->call(UserSeeder::class);        
        $this->call(MiscSeeder::class);
        $this->call(PostSeeder::class);     
    }
}
