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
        Schema::create('content', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Content title
            $table->string('type'); // Content type (e.g., article, video, infographic, forum topic)
            $table->string('category'); // Content category (e.g., grief types, coping mechanisms, self-care, support resources)
            $table->string('target_audience')->nullable(); // Target audience (e.g., general, specific loss types, specific needs)
            $table->text('body'); // Content body (text, HTML, or Markdown)
            $table->unsignedBigInteger('author_id'); // Foreign key for author (references Users table)
            $table->string('keywords')->nullable(); // Content keywords
            $table->date('publication_date'); // Publication date
            $table->timestamps(); // Automatically adds created_at and updated_at columns

            // Foreign key constraint
            $table->foreign('author_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content');
    }
};
