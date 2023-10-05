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
        Schema::create('representants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nif');
            $table->string('email');
            $table->string('position');
            $table->string('username');
            $table->string('password');
            $table->unsignedBigInteger('company_id');
            $table->timestamps();
        });

        Schema::table('representants', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('representants');
    }
};
