<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->string("attendance_id")->primary();
            $table-> string("course_id");
            $table->string("subject_id");
            $table -> date("date");
            $table -> string("teacher_id");

            $table->foreign('course_id')->references('course_id')->on('courses');
            $table->foreign('subject_id')->references('subject_id')->on('subjects');
            $table->foreign('teacher_id')->references('teacher_id')->on('teachers');
            $table->unique(['teacher_id', 'course_id','subject_id','date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
