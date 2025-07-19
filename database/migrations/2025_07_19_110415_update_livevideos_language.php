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
        Schema::table('live_videos', function (Blueprint $table) {
            //
            $table->string('language')->default('en')->after('video_slug');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('live_videos', function (Blueprint $table) {
            //
            $table->dropColumn('language');
        });
    }
};
