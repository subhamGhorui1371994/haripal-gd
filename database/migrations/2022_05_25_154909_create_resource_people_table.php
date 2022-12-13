<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_people', function (Blueprint $table) {
            $table->id();
            $table->string('resource_person_type');
            $table->string('name');
            $table->string('email')->nullable()->default('NA');
            $table->string('mobile')->nullable()->default('NA');
            $table->string('photo')->nullable()->default(null);
            $table->string('experience')->nullable()->default('NA');
            $table->string('designation')->nullable()->default('NA');
            $table->string('qualification')->nullable()->default('NA');
            $table->string('salary')->nullable()->default('NA');
            $table->text('course')->nullable()->default(null);
            $table->boolean('bed')->default(false);
            $table->boolean('dled')->default(false);
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
        Schema::dropIfExists('resource_people');
    }
}
