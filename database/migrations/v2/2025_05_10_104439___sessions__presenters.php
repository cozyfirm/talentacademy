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
        Schema::create('programs__sessions_presenters', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('session_id');
            $table->foreign('session_id')
                ->references('id')
                ->on('programs__sessions')
                ->onDelete('cascade');
            $table->unsignedBigInteger('presenter_id');
            $table->foreign('presenter_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs__sessions_presenters');
    }
};
