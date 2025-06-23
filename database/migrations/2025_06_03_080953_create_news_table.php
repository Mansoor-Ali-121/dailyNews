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
        Schema::create('news', function (Blueprint $table) {

            $table->id();
            $table->string('category_id');
            $table->string('author_id')->nullable();
            $table->string('city_id');
            $table->string('country_id');
            $table->string('news_title');
            $table->string('news_slug');
            $table->string('news_description');
            $table->string('news_iamge');
            $table->string('news_status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
