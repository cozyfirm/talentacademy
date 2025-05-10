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
        Schema::create('__seasons', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->tinyInteger('active')->default(1);
            /** Subtract ID for CSS */
            $table->integer('subtract')->default(5);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('__seasons');
    }
};
