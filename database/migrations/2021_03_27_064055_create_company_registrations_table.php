<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_registrations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('company_name',50);
            $table->string('tegline',100)->nullable();
            $table->string('website',100)->nullable();             
            $table->string('company_email',100)->nullable(); 
            $table->string('founder',85);
            $table->string('founder_email',100)->unique;
            $table->bigInteger('contact_number');
            $table->string('street_address');
            $table->string('city',100);
            $table->string('state',85);
            $table->string('country',85);
            $table->bigInteger('pin_code');
            $table->string('gst_in',20);
            $table->time('office_start');
            $table->time('office_end');
            $table->date('establish');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->bigInteger('whatsapp')->nullable();
            $table->string('category');
            $table->string('erp_url');
            $table->string('password',70);
            $table->string('slug',70);
            $table->string('macaddress',200)->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_registrations');
    }
}
