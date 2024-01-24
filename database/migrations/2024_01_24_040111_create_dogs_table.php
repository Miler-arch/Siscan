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
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('father');
            $table->string('mother');
            $table->string('gender');
            $table->string('race');
            $table->string('color');
            $table->string('tattoo')->nullable();
            $table->string('chip')->nullable();
            $table->date('birthdate');
            $table->string('specialty')->nullable();
            $table->string('photo')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dogs');
    }
};
