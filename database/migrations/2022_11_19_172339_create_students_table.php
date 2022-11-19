<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string("student_id",20)->primary();
            $table -> string("first_name");
            $table-> string("last_name");
            $table -> string("address_village")->nullable();
            $table -> string("address") ;
            $table -> tinyInteger("gender");
            $table -> date("birth_date");
            $table -> string("email",200)-> nullable()->unique();
            $table -> string("phone",20)->unique();
            $table -> string("image")->nullable();
            $table -> string("course_id");

            $table->foreign('course_id')->references('course_id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
