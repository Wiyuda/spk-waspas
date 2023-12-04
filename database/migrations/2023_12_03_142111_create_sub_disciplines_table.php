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
        Schema::create('sub_disciplines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('discipline_id')->constrained('disciplines')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('kehadiran', [1, 2, 3, 4, 5]);
            $table->enum('kegiatan', [1, 2, 3, 4, 5]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_disciplines');
    }
};
