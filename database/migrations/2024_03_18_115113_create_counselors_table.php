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
            $table->id(); // Auto-incrementing primary key

            $table->string('name'); // Name of the program

            $table->text('description'); // Description of the program

            $table->bigInteger('counselor_id')->unsigned()->nullable(false);
            $table->foreign('counselor_id')->references('id')->on('trainers')->onDelete('cascade');
            // Foreign key referencing the 'trainers' table (assuming your counselor model is named 'Trainer')

            $table->date('start_date'); // Start date of the program

            $table->date('end_date')->nullable(); // Optional end date (if program is ongoing)

            $table->integer('duration')->unsigned(); // Duration of the program in weeks

            $table->string('status')->default('active'); // Status of the program (e.g., active, closed)

            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counselors');
    }
};
