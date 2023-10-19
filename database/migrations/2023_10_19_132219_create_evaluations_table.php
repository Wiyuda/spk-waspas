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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('perilaku', ['Sangat Baik', 'Baik', 'Cukup Baik', 'Kurang Baik', 'Buruk']);
            $table->enum('penampilan', ['Sangat Baik', 'Baik', 'Cukup Baik', 'Kurang Baik', 'Buruk']);
            $table->enum('kedisiplinan', ['Sangat Disiplin', 'Disiplin', 'Cukup Disiplin', 'Kurang Disiplin', 'Buruk']);
            $table->enum('knowledge', ['A', 'B', 'C', 'D', 'E']);
            $table->enum('inovasi', ['A', 'B', 'C', 'D', 'E']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
