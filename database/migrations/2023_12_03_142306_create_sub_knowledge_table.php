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
        Schema::create('sub_knowledge', function (Blueprint $table) {
            $table->id();
            $table->foreignId('knowledge_id')->constrained('knowledge')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('soft_skills', [1, 2, 3, 4, 5]);
            $table->enum('hard_skills', [1, 2, 3, 4, 5]);
            $table->enum('aktif', [1, 2, 3, 4, 5]);
            $table->enum('pricipal_objective', [1, 2, 3, 4, 5]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_knowledge');
    }
};
