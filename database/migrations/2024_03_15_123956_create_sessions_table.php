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
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('counsellor_id')->references('id')->on('counsellors')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('session_time');
            $table->string('duration')->nullable(); // Session length
            $table->text('notes')->nullable(); // Additional notes
            $table->string('status')->default('pending'); // Options: pending, confirmed, completed, cancelled
            $table->timestamps();
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
