<?php

use App\Models\Candidate;
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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->uuid('external_id')->unique();
            $table->foreignIdFor(Candidate::class);
            $table->string('school_name')->index();
            $table->string('degree_name')->index();
            $table->string('location')->index();
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_present')->index();
            $table->unsignedSmallInteger('position')->index()->index(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
