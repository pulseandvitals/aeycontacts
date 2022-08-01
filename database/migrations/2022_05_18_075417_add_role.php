<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRole extends Migration
{

    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('previous_work')->nullable();
            $table->string('work_objective')->nullable();
          });
    }

    public function down()
    {
        //
    }
}
