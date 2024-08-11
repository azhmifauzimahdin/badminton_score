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
        Schema::create('skors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fightid');
            $table->integer('set')->default(1);
            $table->integer('skorplayerone')->default(0);
            $table->integer('skorplayertwo')->default(0);
            $table->timestamp('startdate')->nullable();
            $table->timestamp('enddate')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skors');
    }
};
