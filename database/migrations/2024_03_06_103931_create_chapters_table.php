<?php

use App\Models\Course;
use App\Models\Quiz;
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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Course::class)->index();
            $table->foreignIdFor(Quiz::class)->nullable()->index();
            $table->string('title')->index();
            $table->text('description')->nullable();
            $table->text('image_url')->nullable();
            $table->text('video_url')->nullable();
            $table->boolean('is_published')->default(true);
            $table->boolean('is_free')->default(true);
            $table->boolean('is_access')->default(true);
            $table->unsignedInteger('position')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
