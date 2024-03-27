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
        Schema::create('counselors', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('UserId')->unsigned();
            $table->foreignId('UserId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Name', 25);
            $table->string('Phone', 15); // Changed to string to allow special characters like '+'
            $table->string('Sector', 20);
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
        Schema::dropIfExists('counselors');
    }
};
