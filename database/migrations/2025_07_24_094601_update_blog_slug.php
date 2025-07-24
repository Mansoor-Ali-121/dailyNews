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
        Schema::table('blogs', function (Blueprint $table) {
            // change blog slug into nullable
            $table->dropUnique('blogs_blog_slug_unique');

            // Then allow nullable (optional)
            $table->string('blog_slug')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            //
            $table->dropUnique('blogs_blog_slug_unique');
        });
    }
};
