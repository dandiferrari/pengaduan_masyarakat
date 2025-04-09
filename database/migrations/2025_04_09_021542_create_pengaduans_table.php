<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('bukti')->nullable(); // path file foto/pdf
            $table->enum('status', ['pending', 'disetujui', 'ditolak', 'ditutup'])->default('pending');
            $table->text('alasan_penolakan')->nullable();
            $table->string('kode_akses')->unique(); // token untuk pelapor membuka
            $table->boolean('ditutup_oleh_pelapor')->default(false);
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
