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
        Schema::create('m_user', function (Blueprint $table) {
            $table->id('user_id');
            $table->foreignId('level_id')->constrained('m_level', 'level_id');
            $table->string('username',50);
            $table->string('nama',100);
            $table->string('email',100)->unique();
            $table->string('password',255);
            $table->string('profile_picture',255)->nullable()->comment('Path ke file di local storage');
            $table->string('bio',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_user');
    }
};
