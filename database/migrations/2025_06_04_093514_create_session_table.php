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
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Corresponds to `id` varchar(255) NOT NULL, PRIMARY KEY (`id`)
            $table->foreignId('user_id')->nullable()->index(); // Corresponds to `user_id` bigint(20) unsigned DEFAULT NULL, KEY `sessions_user_id_index`
            $table->string('ip_address', 45)->nullable(); // Corresponds to `ip_address` varchar(45) DEFAULT NULL
            $table->text('user_agent')->nullable(); // Corresponds to `user_agent` text DEFAULT NULL
            $table->longText('payload'); // Corresponds to `payload` longtext NOT NULL
            $table->integer('last_activity')->index(); // Corresponds to `last_activity` int(11) NOT NULL, KEY `sessions_last_activity_index`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};