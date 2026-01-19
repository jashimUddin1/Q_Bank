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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('class_id')->nullable();
            $table->BigInteger('subject_id')->nullable();
            $table->bigInteger('chapter_id')->nullable();
            $table->text('description')->nullable();
            $table->text('old_text')->nullable();
            $table->text('new_text')->nullable();
            $table->string('action');
            $table->bigInteger('action_user');
            $table->timestamp('action_time')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
