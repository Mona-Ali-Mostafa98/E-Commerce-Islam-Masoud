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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                    ->constrained('users')
                    ->references('id')
                    ->onUpdate('cascade')
                    ->nullOnDelete();


            $table->string('order_number')->unique();

            $table->string('payment_method');

            $table->enum('status', ['pending', 'charged', 'delivering'])->default('pending');

            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');

            $table->float('shipping_price')->default(0);

            $table->float('total_price')->default(0);

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
        Schema::dropIfExists('orders');
    }
};