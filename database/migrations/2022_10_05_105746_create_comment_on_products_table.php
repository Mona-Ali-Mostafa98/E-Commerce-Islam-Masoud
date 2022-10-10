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
        Schema::create('comment_on_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                    ->constrained('users')
                    ->references('id')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreignId('product_id')
                    ->constrained('products')
                    ->references('id')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->enum('rate', [1, 2, 3, 4, 5]);

            $table->text('comment');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_on_products');
    }
};