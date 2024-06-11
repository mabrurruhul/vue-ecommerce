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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('method', 100);
            $table->decimal('amount', 10,2);
            $table->enum('status', ['complete', 'pending'])->default('pending');
            $table->unsignedBigInteger('order_id');
            $table->timestamps();
        });
    }
   
    /**
     * Reverse the migrations.z
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
