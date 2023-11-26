<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $n = rand(5, 10);
        $users = collect();
        for ($i = 1; $i <= $n; $i++) { 
            $users -> add(User::factory()->create(
                ['email' => 'user'.$i.'@szerveroldali.hu']
            ));
        }

        $posts = Post::factory(rand(10,20))->create();
        $categories = Category::factory(rand(5,10))->create();

        $posts -> each(function($p) use (&$users, &$categories){ // Külön meg kell adni, hogy használhatja a $users változót, mert nem lát ki magából
            $p -> author() -> associate($users -> random()) -> save(); // associate(x) x-et hozzárendelem.
            $p -> categories() -> attach($categories -> random(rand(1, $categories -> count())));
        });

        /* u.a., mint a fenti megoldás, csak for ciklussal
        for ($i = 1; $i <= 10; $i++) { 
            Post::factory()->create(
                ['user_id' => $users -> random() -> id]
            );
        }
        */

        // \App\Models\User::factory(10)->create(); // Generáljunk 10 db usert a factory-vel - make-el létrehozza, de nem rakja be a DB-be, create-el be is rakja.

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
