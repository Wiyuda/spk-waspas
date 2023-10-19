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
        Schema::create('numerical_assesments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('perilaku', ['5', '4', '3', '2', '1']);
            $table->enum('penampilan', ['5', '4', '3', '2', '1']);
            $table->enum('kedisiplinan', ['5', '4', '3', '2', '1']);
            $table->enum('knowledge', ['5', '4', '3', '2', '1']);
            $table->enum('inovasi', ['5', '4', '3', '2', '1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('numerical_assesments');
    }
};
