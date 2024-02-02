<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('litters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dog_id');
            $table->string('name');
            $table->string('race');
            $table->date('birthdate');
            $table->string('type_of_birth');
            $table->integer('born_male');
            $table->integer('born_female');
            $table->integer('male_death');
            $table->integer('female_death');
            $table->string('note');
            $table->string('photo');
            $table->foreign('dog_id')->references('id')->on('dogs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('litters');
    }
};
