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
        Schema::create('subphases', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('subphase_parent_id')->nullable();
            $table->unsignedBigInteger('phase_id');
            $table->timestamps();
        });

        Schema::table('subphases', function (Blueprint $table) {
            $table->foreign('subphase_parent_id')->references('id')->on('subphases')->onDelete('cascade');
        });

        Schema::table('subphases', function (Blueprint $table) {
            $table->foreign('phase_id')->references('id')->on('phases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subphases');
    }
};
