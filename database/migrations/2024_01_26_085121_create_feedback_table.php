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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key for user
            $table->unsignedBigInteger('item_id'); // Foreign key for item
            $table->tinyInteger('rating_value'); // Assuming a 1-5 rating scale
            $table->timestamp('timestamp'); // Time of rating submission
            $table->text('additional_data')->nullable(); // Optional additional data

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
