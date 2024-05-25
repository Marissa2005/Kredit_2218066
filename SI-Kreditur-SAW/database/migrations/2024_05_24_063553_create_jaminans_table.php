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
        Schema::create('jaminans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calon_id');
            $table->foreign('calon_id')->references('id')->on('calon_krediturs')->onDelete('cascade');
            $table->string('jenis_aset')->nullable();
            $table->string('nilai_aset')->nullable();
            $table->string('status_kepemilikan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jaminans');
    }
};
