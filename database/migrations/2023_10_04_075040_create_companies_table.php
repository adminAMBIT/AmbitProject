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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->char('cif', 9)->unique();
            $table->string('email', 100)->unique();
            $table->string('country', 100);
            $table->string('street_address', 100);
            $table->string('city', 100);
            $table->string('province', 100);
            $table->string('postal_code', 100);
            $table->string('representant_name', 100);
            $table->string('representant_dni', 9);
            $table->string('representant_position', 100);
            $table->string('username', 100)->unique();
            $table->string('password', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
