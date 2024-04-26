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
        Schema::create('exam_fees', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('student_id');
            $table->string('class');
            $table->string('term');
            $table->string('amount');
            $table->string('payment_status');
            $table->string('payment_method');
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_fees');
    }
};
