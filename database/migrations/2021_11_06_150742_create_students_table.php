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
        Schema::create('programmes',function(Blueprint $table){
            //$table->increments('id');
            $table->string('programme_id');
            $table->string('programme_name');     
            $table->timestamps();
            
            $table->primary('programme_id');
        });

        Schema::create('students', function (Blueprint $table) {
            $table->string('programme_id');
            $table->string('student_id');
            $table->string('name');            
            $table->integer('age');             
            $table->char('gender',1);
            $table->integer('class');                     
            $table->double('CGPA'); 
            $table->string('address');        
            $table->string('email');
            $table->timestamps();

            $table->primary('student_id');

            $table->foreign('programme_id')
                  ->references('programme_id')
                  ->on('programmes')->onDelete('cascade');
        });        

        Schema::create('courses',function(Blueprint $table){
            $table->string('programme_id');
            $table->string('course_id');
            $table->string('course_name');
            $table->integer('credit_hours');
            $table->double('payment_fee');

            $table->primary('course_id');

            $table->foreign('programme_id')
                  ->references('programme_id')
                  ->on('programmes')->onDelete('cascade');
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

// insert into programmes(programme_id,programme_name) values ('DFT2','IT');
// insert into students (programme_id,student_id,name,age,gender,class,CGPA,address,email) values ('DFT2','20WMD06313','YIYI',19,'F',15,3.7,'LESTARI PERDANA','yiyi@gmail.com');
// insert into courses (programme_id,course_id,course_name,credit_hours,payment_fee) values ('DFT2','AACS3304','Design','4',800);