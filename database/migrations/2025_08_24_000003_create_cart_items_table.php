<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->cascadeOnDelete();
            $table->foreignId('poster_id')->constrained('posters')->cascadeOnDelete();
            $table->unsignedInteger('qty')->default(1);
            $table->decimal('price', 10, 2); // snapshot price at time of adding
            $table->timestamps();
            $table->unique(['cart_id', 'poster_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
