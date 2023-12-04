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
        Schema::dropIfExists('numerical_assesments');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('numerical_assesments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('perilaku', ['1', '2', '3', '4', '5']);
            $table->enum('penampilan', ['1', '2', '3', '4', '5']);
            $table->enum('kedisiplinan', ['1', '2', '3', '4', '5']);
            $table->enum('knowledge', ['1', '2', '3', '4', '5']);
            $table->enum('inovasi', ['1', '2', '3', '4', '5']);
            $table->timestamps();
        });
    }
};
