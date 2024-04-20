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
        Schema::create('__inbox__to', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('inbox_id');
            $table->foreign('inbox_id')
                ->references('id')
                ->on('__inbox')
                ->onDelete('cascade');
            $table->unsignedBigInteger('to');
            $table->foreign('to')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->tinyInteger('read')->default(false);
            $table->dateTime('read_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('__inbox__to');
    }
};
