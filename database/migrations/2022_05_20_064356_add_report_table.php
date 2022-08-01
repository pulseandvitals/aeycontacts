<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReportTable extends Migration
{

    public function up()
    {
        Schema::create('report_users', function (Blueprint $table) {
            $table->id();
            $table->text('reason')->nullable();
            $table->string('user_account_id')->nullable();
            $table->string('user_reported_id')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        //
    }
}
