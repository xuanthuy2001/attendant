<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_details', function (Blueprint $table) {
            $table->string("attendance_id");
            $table -> string("student_id",20);
            $table -> integer("status");
            $table -> string("notes");

            $table->foreign('attendance_id')->references('attendance_id')->on('attendances');
            $table->foreign('student_id')->references('student_id')->on('students');
            
            $table->unique(['attendance_id', 'student_id','status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_details');
    }
}
