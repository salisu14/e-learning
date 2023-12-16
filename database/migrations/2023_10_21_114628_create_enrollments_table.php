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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->timestamp('enrollment_date');
            $table->foreignId('course_id')->constrained();
            $table->foreignId('session_id')->constrained();
            $table->foreignId('student_id')->constrained();
            $table->timestamps();

            // Add a unique constraint for the combination of course_id, session_id, and student_id
            $table->unique(['course_id', 'session_id', 'student_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
