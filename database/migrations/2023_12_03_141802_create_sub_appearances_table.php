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
        Schema::create('sub_appearances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appearance_id')->constrained('appearances')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('kerapian', [1, 2, 3, 4, 5]);
            $table->enum('kesesuaian', [1, 2, 3, 4, 5]);
            $table->enum('alat_perlindungan', [1, 2, 3, 4, 5]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_appearances');
    }
};
