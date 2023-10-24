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
        Schema::create('normalizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->double('perilaku', 3,2)->nullable();
            $table->double('penampilan', 3,2)->nullable();
            $table->double('kedisiplinan', 3,2)->nullable();
            $table->double('knowledge', 3,2)->nullable();
            $table->double('inovasi', 3,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('normalizations');
    }
};
