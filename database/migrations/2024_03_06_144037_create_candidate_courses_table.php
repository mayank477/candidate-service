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
        Schema::create('candidate_courses', function (Blueprint $table) {
            $table->id();
            $table->uuid('external_id')->unique();
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('course_id');
            $table->boolean('is_completed')->default(false);
            $table->unsignedDecimal('progress')->default(0);
            $table->timestamps();

            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_courses');
    }
};
