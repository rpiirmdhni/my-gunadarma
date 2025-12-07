<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('digibooks', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('desc')->nullable();
            $table->text('writer')->nullable();
            $table->longText('coverimg_path')->nullable();
            $table->longText('file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digibooks');
    }
};
