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
        Schema::create('progressions', function (Blueprint $table) {
            $table->id();
            $table->uuid('external_id')->unique();
            $table->unsignedBigInteger('candidate_course_id');
            $table->unsignedBigInteger('chapter_id');
            $table->unsignedBigInteger('candidate_id');
            $table->boolean('is_completed')->default(false);
            $table->timestamps();

            $table->foreign('candidate_course_id')->references('id')->on('candidate_courses');
            $table->foreign('chapter_id')->references('id')->on('chapters');
            $table->foreign('candidate_id')->references('id')->on('candidates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progressions');
    }
};
