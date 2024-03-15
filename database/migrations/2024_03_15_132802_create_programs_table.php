<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name',65);
            $table->string('Day',65);
            $table->string('Duration',50);
            $table->integer('CounselorId')->unsigned();
            $table->foreign('TrainerId')->references('id')->on('trainers')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('Price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
