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
        Schema::table('users', function (Blueprint $table) {
            $table->text('user_description')->after('email')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'user_description')) {
                // Move it back to the end of the table for rollback simplicity.
                // If you know its precise original position, you can specify that.
                $table->text('user_description')->change(); // Revert type if changed
            }
        });
    }
};
