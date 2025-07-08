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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->nullable();
            $table->string('author_id');
            $table->string('city_id')->nullable();
            $table->string('country_id')->nullable();
            $table->string('blog_title'); // Changed from news_title to blog_title
            $table->string('blog_slug')->unique(); // Changed from news_slug to blog_slug, added unique
            $table->longText('blog_description'); // Changed from news_description to blog_description
            $table->string('blog_image'); // Changed from news_image to blog_image
            $table->string('blog_status')->default('active'); // Changed from news_status to blog_status
            $table->longText('blog_content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
