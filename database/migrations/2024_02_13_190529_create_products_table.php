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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('products_id');
            $table->string('name', 150);
            $table->text('description')->max(400);
            $table->decimal('price');
            $table->integer('stock');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('state_id');
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->
            on('categories')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('state_id')->references('state_id')->
            on('states')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
