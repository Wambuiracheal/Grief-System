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
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken(); 
            $table->timestamps();
            
        });

        {
            Schema::table('registration', function (Blueprint $table) {
                $table->renameColumn('fname', 'first_name');
            });

            Schema::table('registration', function (Blueprint $table) {
                $table->renameColumn('lname', 'last_name');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration');
    }
};
