<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('welcome_title');
            $table->text('welcome_content');
            $table->string('about_us_title');
            $table->text('about_us_content');
            $table->string('about_trust_title');
            $table->text('about_trust_content');
            $table->string('president_desk_title');
            $table->text('president_desk_content');
            $table->string('secretary_desk_title');
            $table->text('secretary_desk_content');
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
        Schema::dropIfExists('home_pages');
    }
}
