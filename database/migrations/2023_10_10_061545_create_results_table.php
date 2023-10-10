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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->string('examinee_name')->nullable();
            $table->string('examinee_id')->nullable();
            $table->string('examinee_roll_no')->nullable();
            $table->integer('exam_id')->nullable();
            $table->float('total_marks')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
