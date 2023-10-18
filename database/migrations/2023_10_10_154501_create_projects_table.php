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
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); 
            $table->string('ProjectName');
            $table->text('Description')->nullable();
            $table->unsignedBigInteger('UserID'); 
            $table->foreign('UserID')->references('id')->on('users');
            $table->date('StartDate')->nullable();
            $table->date('DueDate')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
