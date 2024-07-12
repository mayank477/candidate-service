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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->uuid('external_id')->unique();
            $table->string('name')->index();
            $table->string('email')->unique();
            $table->unsignedMediumInteger('years_of_experience')->index();
            $table->unsignedInteger('quality_rating')->index()->default(0);
            $table->string('password')->nullable();
            $table->date('dob')->index()->nullable();
            $table->string('phone_number')->nullable()->index();
            $table->string('address')->nullable()->index();
            $table->string('job_title')->index()->nullable();
            $table->string('nationality')->index();
            $table->string('place_of_birth')->index()->nullable();
            $table->string('github_url')->nullable();
            $table->string('linked_in_url')->nullable();
            $table->string('profile')->nullable();
            $table->enum('status', ['confirmed', 'not confirmed'])->default('not confirmed')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
