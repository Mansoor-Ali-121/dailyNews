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
        Schema::create('live_videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_url');
            $table->string('category_id');
            $table->string('author_id');
            $table->string('video_title');
            $table->string('video_status');
            $table->string('video_slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_videos');
    }
};
