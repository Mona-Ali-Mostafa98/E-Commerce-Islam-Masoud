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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->text('website_logo');
            $table->text('website_name');

            $table->string('mobile_number');
            $table->string('email');

            $table->text('currency_code')->default('SAR');
            $table->integer('tax')->nullable();

            $table->longText('about_services');

            $table->longText('about_offers');

            $table->longText('privacy_policy');

            $table->longText('about_us_description');
            $table->text('about_us_image');

            $table->longText('our_vision');
            $table->longText('our_message');
            $table->longText('our_goals');


            $table->text('facebook_url')->nullable();
            $table->text('twitter_url')->nullable();
            $table->text('instagram_url')->nullable();
            $table->text('linkedin_url')->nullable();
            $table->string('whatsapp_number')->nullable();

            $table->longText('copy_footer_text');

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
        Schema::dropIfExists('settings');
    }
};
