<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubject extends Migration
{

    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->string('message_subject')->nullable();
          });
    }

    public function down()
    {
        //
    }
}
