<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumn extends Migration
{

    public function up()
    {
        Schema::table('report_users', function (Blueprint $table) {
            $table->boolean('isReported')->default(false);
          });
    }

    public function down()
    {
        //
    }
}
