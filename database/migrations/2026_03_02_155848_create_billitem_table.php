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
        Schema::create('billitem', function (Blueprint $table) {
            $table->id();
            $table->integer('bill_id')->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
            $table->integer('item_id')->foreign('item_id')->references('id')->on('inventory')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billitem');
    }
};
