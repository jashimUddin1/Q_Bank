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
        Schema::create('cq_questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('class_id');
            $table->bigInteger('subject_id');
            $table->bigInteger('chapter_id')->nullable();
            $table->bigInteger('lesson_id')->nullable();
            $table->string('proviking_img')->nullable();
            $table->string('proviking');
            $table->integer('total_marks')->default(10);
            $table->string('question_a');
            $table->string('question_b');
            $table->string('question_c');
            $table->string('question_d');
            $table->integer('marks_a')->default(1);
            $table->integer('marks_b')->default(2);
            $table->integer('marks_c')->default(3);
            $table->integer('marks_d')->default(4);
            $table->enum('level', ['easy', 'medium', 'hard'])->default('easy');
            $table->string('type');
            $table->string('board_name')->nullable(); 
            $table->integer('year');
            $table->bigInteger('insert_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cq_questions');
    }
};
