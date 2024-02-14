<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_provision_contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('animal_id');
            $table->string('aproximated_age');
            $table->string('color');
            $table->date('date_start');
            $table->date('date_end');
            $table->double('amount');
            $table->foreign('animal_id')->references('id')->on('animals');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_provision_contracts');
    }
};
