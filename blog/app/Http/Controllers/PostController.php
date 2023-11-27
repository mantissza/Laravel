<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', [
            //'posts' => Post::all() // Túl sok lekérdezés fog végbemenni, ha hozzá van kapcsolva másik tábla.
            'posts' => Post::with('author') -> get(), // Eager loading: Előre betölti az author-okat, hogy ne menet közben kelljen újra meghívni a user táblából.
            'categories' => Category::all(),
            'user_count' => User::count(),
            'comment_count' => 0
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate(
            ['title' => 'required',
            'content' => 'required',
            'categories' => 'nullable', //Nem kötelező kategóriát választani
            'categories.*' => 'integer|distinct|exists:categories,id'], // legyen szám, különböző, a számhoz létezzen a kategóriák táblából egy id mező.
            ['name.required' => 'A név kitöltése kötelező!',
            'name.min' => 'A név legalább :min karakter legyen!',
            'name.unique' => 'A név legyen egyedi!'] // Külön megadható a hibaüzenet szövege, az alapértelmezett szövegek a lang/en/validation.php-ben található.
        );

        $p = Post::create($validated); // Post létrehozása
        $p -> author() -> associate(User::all() -> random() ) -> save();
        $p -> categories() -> sync($request -> categories);

        // Session::flash('post-created', $p -> name);

        return redirect() -> route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
