<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo', 255)->nullable()->default(null);
            $table->string('footer_logo', 255)->nullable()->default(null);
            $table->string('footer_short_info', 255)->nullable()->default(null);
            $table->string('address', 255)->nullable()->default(null);
            $table->string('email', 255)->nullable()->default(null);
            $table->string('phone', 255)->nullable()->default(null);
            $table->string('facebook_url', 255)->nullable()->default(null);
            $table->string('twitter_url', 255)->nullable()->default(null);
            $table->string('instagram_url', 255)->nullable()->default(null);
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
        Schema::dropIfExists('site_settings');
    }
}
