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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); 
            $table->string('TaskName');
            $table->text('Description')->nullable();
            $table->integer('Priority');
            $table->string('Status');
            $table->timestamp('StartDate');
            $table->timestamp('DueDate');
            $table->unsignedBigInteger('UserId');
            $table->foreign('UserId')->references('id')->on('users'); 
            $table->unsignedBigInteger('ProjectID');
            $table->foreign('ProjectID')->references('id')->on('projects'); 
            $table->timestamps(); 
            $table->string('Type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
