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
        Schema::create('exam_setups', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->foreignId('subject_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('chapter_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();

            $table->string('title')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('total_question')->nullable();
            $table->integer('easy_question')->nullable();
            $table->integer('hard_question')->nullable();
            $table->text('question_description')->nullable();
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->integer('status')->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_setups');
    }
};
