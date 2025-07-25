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
        Schema::table('news', function (Blueprint $table) {
            // Add a new column for language
            $table->string('language')->default('en')->after('news_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            //
            // Drop the language column if it exists
            if (Schema::hasColumn('news', 'language')) {
                $table->dropColumn('language');
            }
        });
    }
};
