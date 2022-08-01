<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JobOffersCreate extends Migration
{
    public function up()
    {
        Schema::create('job_offers', function (Blueprint $table) {
            $table->id();
            $table->string('job_description')->nullable();
            $table->string('company_name')->nullable();
            $table->string('work_base')->nullable();
            $table->string('qualification')->nullable();
            $table->bigInteger('user_id');
            $table->bigInteger('applicants_limit');
            $table->bigInteger('applicants_count');
            $table->boolean('isOpen')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
