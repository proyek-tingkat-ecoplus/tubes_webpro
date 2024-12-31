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
        Schema::create('alats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users")->onDelete('cascade')->onUpdate('cascade');
            $table->string('kode_alat');
            $table->string('nama_alat');
            $table->string('foto');
            // $table->string('merk');
            $table->string('jenis');
            $table->enum('kondisi', ['baru', 'bekas']);
            $table->integer('jumlah');
            $table->string("deskripsi_barang");
            $table->timestamps();
        });

        Schema::create("report_alats", function (Blueprint $table) {
            $table->id();
            $table->foreignId("alat_id")->constrained("alats")->onDelete("cascade");
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
            $table->string("judul_report");
            $table->text("deskripsi");
            $table->string("binwas");
            $table->string("tahun_operasi");
            $table->text("latitude");
            $table->text("longitude");
            $table->text("address");
            $table->text("photo");
            $table->enum("status", ["pending", "approved", "rejected"]);
            $table->timestamp("tanggal")->nullable();
            $table->timestamp("rejected_at")->nullable();
            $table->timestamp("approved_at")->nullable();
            $table->foreignId("approved_by")->nullable()->constrained("users")->onDelete("set null");
            $table->foreignId("rejected_by")->nullable()->constrained("users")->onDelete("set null");
            // $table->string("approved_reason")->nullable();
            // $table->string("rejected_reason")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_alats');
        Schema::dropIfExists('alats');
    }
};
