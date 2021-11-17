<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_adds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('employee_name',50);
            $table->string('employee_mail',70);
            $table->string('emp_job_role',50);
            $table->float('emp_sallery',8,2);
            $table->mediumText('image');            
            $table->mediumText('residential_proof');
            $table->mediumText('qualification_proof');
            $table->mediumText('Certification_proof');
            $table->bigInteger('primary_contect');
            $table->bigInteger('secoundry_contect');
            $table->date('dob');
            $table->string('gender',10);
            $table->mediumText('street_address');
            $table->string('city');
            $table->bigInteger('pincode');
            $table->string('state');
            $table->string('country');
            $table->string('company_name')->nullable();
            $table->string('Experience')->nullable();
            $table->float('salary',8,2)->nullable();
            $table->mediumText('salery_slip')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_adds');
    }
}
