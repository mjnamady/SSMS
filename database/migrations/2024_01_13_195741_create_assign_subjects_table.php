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
        Schema::create('assign_subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id');
            $table->integer('subject_id');
            $table->string('full_mark')->nullable();
            $table->string('pass_mark')->nullable();
            $table->string('subjective_mark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_subjects');
    }
};

