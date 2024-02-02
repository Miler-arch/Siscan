<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jealousies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dog_id');
            $table->date('initial_date');
            $table->date('final_date');
            $table->date('next_date');
            $table->string('description');
            $table->tinyInteger('status')->default(1)->comment('1: Celo, 0: No Celo');
            $table->foreign('dog_id')->references('id')->on('dogs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jealousies');
    }
};
