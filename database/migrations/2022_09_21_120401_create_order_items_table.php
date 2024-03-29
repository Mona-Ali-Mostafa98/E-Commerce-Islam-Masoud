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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                    ->constrained('orders')
                    ->references('id')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreignId('product_id')
                    ->constrained('products')
                    ->references('id')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->string('product_name');

            $table->float('product_price');

            $table->unsignedSmallInteger('quantity')->default(1);

            $table->unique(['order_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};