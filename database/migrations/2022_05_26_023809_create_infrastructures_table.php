<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfrastructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infrastructures', function (Blueprint $table) {
            $table->id();
            $table->text('building')->nullable()->default(null);
            $table->text('campus')->nullable()->default(null);
            $table->text('class_rooms')->nullable()->default(null);
            $table->text('smart_class')->nullable()->default(null);
            $table->text('laboratories')->nullable()->default(null);
            $table->text('music')->nullable()->default(null);
            $table->text('library')->nullable()->default(null);
            $table->text('canteen')->nullable()->default(null);
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
        Schema::dropIfExists('infrastructures');
    }
}
