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
        Schema::create('t_projectoffers', function (Blueprint $table) {
            $table->id('penawaran_id');
            $table->foreignId('project_id')->constrained('t_projects','project_id');
            $table->foreignId('user_id')->constrained('m_user','user_id');
            $table->integer('penawaran_harga');
            $table->text('penawaran_deskripsi');
            $table->dateTime('Tanggal_penawaran');
            $table->string('status',20);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_projectoffers');
    }
};
