<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestamp extends Migration
{

    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->timestamp('timestamp_seen')->nullable();
          });
    }


    public function down()
    {
        //
    }
}
