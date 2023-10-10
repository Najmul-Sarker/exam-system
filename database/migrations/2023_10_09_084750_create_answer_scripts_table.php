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
        Schema::create('answer_scripts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->foreignId('subject_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('chapter_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();

            $table->string('examinee_name')->nullable();
            $table->integer('roll_no')->nullable();
            $table->string('exam_id')->nullable();
            $table->string('question_text')->nullable();
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->string('option4')->nullable();
            $table->string('correcct_answer')->nullable();
            $table->string('submitted_answer')->nullable();
            $table->string('question_level')->nullable();
            $table->string('marks')->nullable();
            $table->string('type')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_scripts');
    }
};
