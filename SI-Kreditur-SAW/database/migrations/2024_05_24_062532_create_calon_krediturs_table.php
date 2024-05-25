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
        Schema::create('calon_krediturs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_calon');
            $table->string('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('jml_hutang')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('penghasilan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_krediturs');
    }
};
