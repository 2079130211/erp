<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_roles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
             $table->string('job_role')->unique();
            $table->float('sallery',8,2)->nullable();
            $table->integer('experience')->nullable();
            $table->string('certification')->nullable();
            $table->string('qualification')->nullable();
            $table->string('part_of_team')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_roles');
    }
}
