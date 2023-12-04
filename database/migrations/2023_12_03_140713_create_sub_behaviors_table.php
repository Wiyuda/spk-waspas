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
        Schema::create('sub_behaviors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('behavior_id')->constrained('behaviors')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('station_routine', [1, 2, 3, 4, 5]);
            $table->enum('breefing', [1, 2, 3, 4, 5]);
            $table->enum('standby', [1, 2, 3, 4, 5]);
            $table->enum('koordinasi', [1, 2, 3, 4, 5]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_behaviors');
    }
};
