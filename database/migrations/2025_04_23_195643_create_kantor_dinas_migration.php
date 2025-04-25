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
        Schema::create('kantor_dinas', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('bio')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('tanggal_jam_buka')->nullable();
            $table->string('tanggal_jam_tutup')->nullable();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('kantor_dinas_id')->nullable()->constrained('kantor_dinas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kantor_dinas_migration');
    }
};
