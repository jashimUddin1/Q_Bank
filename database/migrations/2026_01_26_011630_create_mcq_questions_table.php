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
        Schema::create('mcq_questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('class_id');
            $table->bigInteger('subject_id');
            $table->bigInteger('chapter_id')->nullable();
            $table->bigInteger('lesson_id')->nullable();
            $table->string('questions');
            $table->string('option_a');
            $table->string('option_b');
            $table->string('option_c');
            $table->string('option_d');
            $table->string('right_answer');
            $table->enum('level', ['easy', 'medium', 'hard'])->default('easy');
            $table->string('type');
            $table->integer('year');
            $table->bigInteger('insert_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mcq_questions');
    }
};
