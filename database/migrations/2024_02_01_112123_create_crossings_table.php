<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('crossings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dog_id');
            $table->string('female_dog');
            $table->date('date');
            $table->string('type');

            $table->foreign('dog_id')->references('id')->on('dogs');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crossings');
    }
};
