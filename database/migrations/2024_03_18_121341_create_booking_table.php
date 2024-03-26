<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key

            $table->string('session_name'); // Name of the counseling session

            $table->bigInteger('client_id')->unsigned()->nullable(false);
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            // Foreign key referencing the 'users' table (assuming your client model is User)

            $table->bigInteger('counselor_id')->unsigned()->nullable(false);
            $table->foreign('counselor_id')->references('id')->on('counselors')->onDelete('cascade');
            // Foreign key referencing the 'trainers' table (assuming your counselor model is Trainer)

            $table->date('date'); // Date of the booked session

            $table->integer('duration')->unsigned(); // Duration of the session (e.g., in hours)

            $table->enum('status', ['pending', 'approved', 'cancelled'])->default('pending'); // Status of the booking

            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
