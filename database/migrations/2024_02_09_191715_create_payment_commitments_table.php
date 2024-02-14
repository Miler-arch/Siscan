<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_commitments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->date('date');
            $table->decimal('amount', 10, 2);
            $table->foreign('client_id')->references('id')->on('clients');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_commitments');
    }
};
