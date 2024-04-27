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
        Schema::create('programs__sessions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')
                ->references('id')
                ->on('programs')
                ->onDelete('cascade');
            $table->string('title', 200);
            $table->string('type', 20)->default('workshop');
            $table->string('time_from', 10);
            $table->string('time_to', 10);
            $table->string('duration', 20);
            $table->date('date');
            $table->tinyInteger('public')->default(0);

            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')
                ->references('id')
                ->on('__locations')
                ->onDelete('cascade');

            $table->text('short_description')->nullable();
            $table->text('description')->nullable();

            $table->unsignedBigInteger('presenter_id');
            $table->foreign('presenter_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->text('presenter_data')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs__sessions');
    }
};
