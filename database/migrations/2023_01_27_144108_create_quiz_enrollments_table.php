<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_enrollments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('trainee_id');
            $table->uuid('course_id');
            $table->uuid('quiz_id');

            $table->timestamp('finished_at')->nullable();
            $table->timestamps();

            $table->foreign('trainee_id')->references('id')->on('trainees')->cascadeOnDelete();
            $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete();
            $table->foreign('quiz_id')->references('id')->on('quizzes')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_enrollments');
    }
};
