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
            $table->id();
            $table->string('student_name');
            $table->string('school_id');
            $table->string('father_name');
            $table->string('father_mobile');
            $table->string('father_profession');
            $table->string('mother_name');
            $table->string('mother_mobile');
            $table->string('mother_profession');
            $table->string('email_address');
            $table->string('sms_mobile');
            $table->string('date_of_admission');
            $table->string('student_photo')->nullable();
            $table->string('address');
            $table->string('status');
            $table->string('auther');
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
        Schema::dropIfExists('students');
    }
}
