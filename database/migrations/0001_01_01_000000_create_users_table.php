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
        Schema::create('users', function (Blueprint $table) {
            
            $table->id();
     // Remove the default and make it nullable
            $table->string('user_type')->nullable()->change();
            $table->string('email')->unique();
            $table->string('password'); 
            $table->string('name');
            $table->string('user_image');
            $table->string('user_slug');
            $table->string('user_status')->default('active');
            $table->timestamps();
        });

        // ... (rest of your migrations)
    }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
      
        
    // }
     public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // To revert, you might need to specify a new default
            // or ensure it's not nullable for previous state
              Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
            $table->string('user_type')->default('admin')->nullable(false)->change();
        });
    }
};