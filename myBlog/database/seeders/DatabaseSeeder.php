<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blogging;
use App\Models\Blogs;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(5)->create();
        $user = User::factory()->create([
            'name'=> 'Jun Pudasaini',
            'email'=> 'jun@gmail.com'
        ]);
        Blogs::factory(6)->create([
            'user_id' => $user->id
        ]);

     /*   Blogs::create([
            'title' => 'Laravel Senior Developer', 
            'tags' => 'laravel, javascript',
            'location' => 'Boston, MA',
            'email' => 'email1@email.com',
            'website' => 'https://www.acme.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);
        Blogs::create([
            'title' => 'Backend Developer', 
            'tags' => 'laravel, php, api',
            'location' => 'Newark, NJ',
            'email' => 'email4@email.com',
            'website' => 'https://www.skynet.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
          ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    */
    }
}
