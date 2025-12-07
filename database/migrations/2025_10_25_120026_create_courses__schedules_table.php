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
        Schema::create('courses__schedules', function (Blueprint $table) {
            $table->id();
            //1=senin..., 7=minggu
            $table->enum('day', ['1','2','3','4','5','6', '7'])->default('1');
            $table->unsignedBigInteger('course_id');
            //kode jam kuliah/sesi
            $table->enum('course_time', ['0','1','2','3','4','5','6', '7','8','9','10','11','12','13'])->default('0');
            $table->string('lecturer_id');
            $table->unsignedBigInteger('classroom_id');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('lecturer_id')->references('nidn')->on('lecturers')->onDelete('cascade');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses__schedules');
    }
};
