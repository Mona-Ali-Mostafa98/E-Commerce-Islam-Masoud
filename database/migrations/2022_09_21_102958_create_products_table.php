<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->text('product_name');

            $table->text('product_model')->nullable();

            $table->float('product_price')->default(0);

            $table->boolean('best_selling')->default(0);

            $table->longText('product_details');

            $table->enum('status', ['active', 'draft', 'archived'])->default('active');

            $table->timestamps();

            // new
            $table->string('slug')->unique();
            $table->float('rating')->default(0);
            $table->softDeletes();
            $table->json('options')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};