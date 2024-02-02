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
        Schema::create('veterinary_care_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dog_id');
            $table->string('clinical_signs');
            $table->string('applicant_name');

            $table->foreign('dog_id')->references('id')->on('dogs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veterinary_care_requests');
    }
};
