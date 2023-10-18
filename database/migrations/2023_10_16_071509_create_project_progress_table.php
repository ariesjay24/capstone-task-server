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
        Schema::create('project_progress', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('TaskID');
            $table->foreign('TaskID')->references('id')->on('tasks'); 
            $table->decimal('ProgressPercentage', 5, 2);
            $table->text('ProgressDescription')->nullable();
            $table->timestamp('ProgressDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_progress');
    }
};