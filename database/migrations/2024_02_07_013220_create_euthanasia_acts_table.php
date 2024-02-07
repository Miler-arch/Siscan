<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('euthanasia_acts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dog_id');
            $table->string('reason');
            $table->string('considering');
            $table->string('therefore');
            $table->string('solve');
            $table->string('observation');
            $table->foreign('dog_id')->references('id')->on('dogs');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('euthanasia_acts');
    }
};
