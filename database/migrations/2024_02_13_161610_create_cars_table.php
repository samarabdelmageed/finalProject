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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 100);
            $table->float('price');
            $table->boolean('active');
            $table->longText('content');
            $table->tinyInteger('luggage');
            $table->tinyInteger('doors');
            $table->tinyInteger('passengers');
            $table->string('image',100);
            $table->foreignId('category_id')->constrained('categories')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
