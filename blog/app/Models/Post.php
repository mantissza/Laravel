<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'author_id', 'image_filename'];

    public function author(){
        return $this->belongsTo(User::class); // Itt mégsem kell második paraméternek megadni az 'author_id'-t, mert már a function nevéből ezt kikövetkezteti a Laravel.
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
