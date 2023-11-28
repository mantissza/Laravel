<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->string('title');
            $table->text('content');
            $table->string('image_filename')->nullable();
            $table->boolean('hidden')->default(false);
            $table->timestamps();
            $table->softDeletes(); // Létrejön a deleted_at oszlop, amelybe a törlés ideje kerül. Post::withTrashed()-el kilistázza az így törölteket is.
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
