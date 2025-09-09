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
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id')->unsigned();
            $table->string('name', 1000)->nullable();
            $table->string('bn_name', 200)->nullable();
            $table->double('lat')->nullable();
            $table->double('lon')->nullable();
            $table->string('url', 1000)->nullable();
            $table->timestamps();
            
            // Foreign key constraint to the divisions table
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
