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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key

            $table->bigInteger('client_id')->unsigned()->nullable(false);
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            // Foreign key referencing the 'clients' table (assuming your client model is named 'Client')

            $table->bigInteger('counselor_id')->unsigned()->nullable(false);
            $table->foreign('counselor_id')->references('id')->on('counselors')->onDelete('cascade');
            // Foreign key referencing the 'counselors' table

            $table->dateTime('session_time')->nullable(false); // Scheduled date and time of the session

            $table->integer('duration')->unsigned()->nullable(true); // Duration of the session in minutes (optional)

            $table->text('notes')->nullable(); // Additional notes about the session

            $table->string('status')->default('pending'); // Status of the session (e.g., pending, confirmed, cancelled, completed)

            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
