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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->string('itemCode')->unique();
            $table->string('itemName');
            $table->decimal('price', 8, 2);
            $table->unsignedBigInteger('categoryid')->foreign('categoryid')->references('id')->on('category')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('cost', 8, 2);
            $table->date('exp_Date');
            $table->date('alert_Date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
