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
        Schema::create('order_addresses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                    ->constrained('orders')
                    ->references('id')
                    ->cascadeOnDelete();

            $table->string('first_name');
            $table->string('last_name');

            $table->string('city');
            $table->string('state');

            $table->text('full_address');
            $table->string('mobile_number');

            $table->enum('type', ['billing', 'shipping']);

            // $table->char('country', 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_addresses');
    }
};