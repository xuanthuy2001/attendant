<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichHocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lich_hocs', function (Blueprint $table) {
            $table -> string("teacher_id",20);
            $table -> string("course_id");
            $table -> date("date");
            $table->foreign('teacher_id')->references('teacher_id')->on('teachers');
            $table->foreign('course_id')->references('course_id')->on('courses');
            $table->unique(['teacher_id', 'course_id','date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lich_hocs');
    }
}
