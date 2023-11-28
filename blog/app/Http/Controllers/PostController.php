<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', [
            //'posts' => Post::all() // Túl sok lekérdezés fog végbemenni, ha hozzá van kapcsolva másik tábla.
            'posts' => Post::with('author') -> paginate(9), // Eager loading: Előre betölti az author-okat, hogy ne menet közben kelljen újra meghívni a user táblából.
            'categories' => Category::all(),
            'post_count' => Post::count(),
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
            'categories.*' => 'integer|distinct|exists:categories,id',
            'image_file' => 'nullable|image'], // legyen szám, különböző, a számhoz létezzen a kategóriák táblából egy id mező.
        );

        if ($request -> hasfile('image_file')){
            $file = $request -> file('image_file');
            $fname = $file -> hashName();
            Storage::disk('public') -> put('images/' . $fname, $file -> get());
            $validated['image_filename'] = $fname;
        }

        $p = Post::create($validated); // Post létrehozása
        $p -> author() -> associate( Auth::user() ) -> save();
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
