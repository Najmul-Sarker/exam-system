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
        Schema::create('question_banks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->foreignId('subject_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('chapter_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();

            $table->string('question_text')->nullable();
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->string('option4')->nullable();
            $table->string('correcct_answer')->nullable();
            $table->string('question_level')->nullable();
            $table->string('marks')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('question_banks');
    }
};
