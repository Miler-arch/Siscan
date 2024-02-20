<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('clinical_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('user_id');
            $table->string('sterilized');
            $table->decimal('temp', 8, 2)->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->integer('age')->nullable();
            $table->string('color')->nullable();
            $table->text('observation')->nullable();
            $table->foreign('animal_id')->references('id')->on('animals');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('initial_date')->nullable();
            $table->date('final_date')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('clinical_records');
    }
};
