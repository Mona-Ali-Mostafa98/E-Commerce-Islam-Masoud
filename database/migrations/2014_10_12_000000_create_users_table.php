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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('full_name');

            $table->string('email')->unique()->nullable();

            $table->string('mobile_number')->unique();

            $table->string('password');

            $table->text('profile_image')->nullable();

            $table->boolean('mobile_verified')->default(0)->nullable();

            $table->boolean('receive_notifications')->default(0)->nullable();

            $table->enum('status', ['active' , 'inactive'])->default('active');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
