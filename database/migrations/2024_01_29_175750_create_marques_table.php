<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarquesTable extends Migration
{
    public function up()
    {
        Schema::create('marques', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo_ref');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marques');
    }
}
