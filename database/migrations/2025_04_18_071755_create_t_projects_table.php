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
        Schema::create('t_projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->foreignId('user_id')->constrained('m_user','user_id');
            $table->foreignId('kategori_id')->constrained('m_category','kategori_id');
            $table->string('judul_project',100);
            $table->text('deskripsi');
            $table->integer('bujed_min');
            $table->integer('bujed_max');
            $table->dateTime('tanggal_posting');
            $table->dateTime('deadline');
            $table->string('status',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_projects');
    }
};
