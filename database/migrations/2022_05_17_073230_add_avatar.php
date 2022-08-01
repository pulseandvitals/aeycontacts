<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvatar extends Migration
{

    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('display_photo')->nullable();
          });
    }


    public function down()
    {
        //
    }
}
