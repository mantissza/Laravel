<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = collect();
        for ($i = 1; $i <= 10; $i++) { 
            $users -> add(User::factory()->create(
                ['email' => 'user'.$i.'@szerveroldali.hu']
            ));
        }
        for ($i = 1; $i <= 10; $i++) { 
            Post::factory()->create(
                ['user_id' => $users -> random() -> id]
            );
        }
        // \App\Models\User::factory(10)->create(); // Generáljunk 10 db usert a factory-vel - make-el létrehozza, de nem rakja be a DB-be, create-el be is rakja.

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
