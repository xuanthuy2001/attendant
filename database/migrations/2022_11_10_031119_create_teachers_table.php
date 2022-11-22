<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table -> string('teacher_id',20)->unique();
            $table -> string('fullname');
            $table -> string('address');
            $table -> integer('gender');
            $table -> date('birthdate');
            $table -> string('email');
            $table -> string('phone');
            $table -> string('image')->nullable();
            $table->unique(['email', 'phone']);
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
        Schema::dropIfExists('teachers');
    }
}
