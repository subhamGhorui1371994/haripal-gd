<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->enum('course_type', ['bed', 'dled'])->default('bed');
            $table->string('course_name')->nullable()->default(null);
            $table->string('duration')->nullable()->default(null);
            $table->string('exam_type')->nullable()->default(null);
            $table->string('course')->nullable()->default(null);
            $table->string('intake_capacity')->nullable()->default(null);
            $table->string('board')->nullable()->default(null);
            $table->string('session')->nullable()->default(null);
            $table->string('syllabus')->nullable()->default(null);
            $table->string('admission_link')->nullable()->default(null);
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
        Schema::dropIfExists('courses');
    }
}
