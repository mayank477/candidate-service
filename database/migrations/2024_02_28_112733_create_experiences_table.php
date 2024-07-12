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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Candidate::class);
            $table->uuid('external_id')->unique();
            $table->string('company_name')->index();
            $table->string('job_title')->index();
            $table->string('location')->index();
            $table->unsignedSmallInteger('position')->index()->index(0);
            $table->string('description')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_current_job')->index()->default(true);
            $table->boolean('is_saved')->index()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
