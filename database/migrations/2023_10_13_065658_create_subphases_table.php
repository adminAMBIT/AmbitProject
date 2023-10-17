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
            $table->unsignedBigInteger('phase_id');
            $table->unsignedBigInteger('parent_subphase_id')->nullable();
            $table->timestamps();
        });

        Schema::table('subphases', function (Blueprint $table) {
            $table->foreign('phase_id')->references('id')->on('phases');
        });

        Schema::table('subphases', function (Blueprint $table) {
            $table->foreign('father_id')->references('id')->on('subphases');
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
