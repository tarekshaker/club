<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('sessions', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('sport_id')->unsigned();
            $table->foreign('sport_id')
                ->references('id')
                ->on('sports')
                ->onUpdate('cascade');
            $table->date('date');
            $table->time('start_at');
            $table->time('end_at');
            $table->integer('slots');
            $table->timestamps();


        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('sessions');
    }
}
