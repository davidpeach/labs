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
            $table->unsignedInteger('wp_id')->nullable();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('game_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->string('title')->nullable();
            $table->string('slug');
            $table->string('wp_url')->nullable();
            $table->string('featured_image')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->text('markdown')->nullable();
            $table->string('format');
            $table->string('status');
            $table->timestamp('published_at');
            $table->timestamps();
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
