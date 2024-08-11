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
        Schema::create('final_skors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fightid')->unique();
            $table->integer('skorplayerone')->default(0);
            $table->integer('skorplayertwo')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_skors');
    }
};
