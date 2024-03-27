<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('Name',55);
            $table->integer('ProgramId')->unsigned();
            $table->foreign('ProgramId')->references('id')->on('programs')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('ClientId')->unsigned();
            $table->foreign('ClientId')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('CounselorId')->unsigned();
            $table->foreign('CounselorId')->references('id')->on('counselors')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Duration');
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
};
