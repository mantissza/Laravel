<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate(
            ['name' => 'required|min:3|unique:categories',
            'text-color' => 'required|regex:/^#([0-9a-f]{8})$/i', // hexa kód ellenőrzése!
            'bg-color' => 'required|regex:/^#([0-9a-f]{8})$/i'],
            ['name.required' => 'A név kitöltése kötelező!',
            'name.min' => 'A név legalább :min karakter legyen!',
            'name.unique' => 'A név legyen egyedi!',
            'text-color.regex' => 'A szín formátuma helytelen!',
            'bg-color.regex' => 'A szín formátuma helytelen!'] // Külön megadható a hibaüzenet szövege, az alapértelmezett szövegek a lang/en/validation.php-ben található.
        );

        $validated ['text_color'] = $validated['text-color']; // Más a definícióban és a nézetben a név, így egyenértékűvé tesszük
        $validated ['bg_color'] = $validated['bg-color'];

        $c = Category::create($validated); // Kategória létrehozása

        Session::flash('category-created', $c -> name); //Kiírja, hogy sikerült a kategória létrehozása.

        return redirect() -> route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', [
            'category' => $category,
            'posts' => $category -> posts() -> with('author') -> get(),
            'categories' => Category::all(),
            'user_count' => User::count(),
            'comment_count' => 0
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request -> validate(
            ['name' => 'required|min:3|unique:categories',
            'text-color' => 'required',
            'bg-color' => 'required'],
            ['name.required' => 'A név kitöltése kötelező!',
            'name.min' => 'A név legalább :min karakter legyen!',
            'name.unique' => 'A név legyen egyedi!'] // Külön megadható a hibaüzenet szövege, az alapértelmezett szövegek a lang/en/validation.php-ben található.
        );

        $validated ['text_color'] = $validated['text-color']; // Más a definícióban és a nézetben a név, így egyenértékűvé tesszük
        $validated ['bg_color'] = $validated['bg-color'];

        $category -> update($validated); // Kategória létrehozása
        return redirect() -> route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
