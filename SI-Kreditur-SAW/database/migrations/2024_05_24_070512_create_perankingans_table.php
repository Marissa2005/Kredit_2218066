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
        Schema::create('perankingans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calon_kreditur_id');
            $table->foreign('calon_kreditur_id')->references('id')->on('calon_krediturs')->onDelete('cascade');
            $table->float('nilai_hasil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perankingans');
    }
};
