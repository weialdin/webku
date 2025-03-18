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
        Schema::create('article_news', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('thumbnail');
            $table->text('content');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Relasi ke categories
            $table->foreignId('author_id')->constrained('authors')->onDelete('cascade');  // Relasi ke authors
            $table->enum('is_featured', ['yes', 'no'])->default('no'); // Atau nilai default lain yang sesuai
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_news');
    }
};