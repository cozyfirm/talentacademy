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
        Schema::create('programs__applications', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')
                ->references('id')
                ->on('programs')
                ->onDelete('cascade');

            $table->unsignedBigInteger('attendee_id');
            $table->foreign('attendee_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('app_status')->default('in_queue'); // 1. in_queue; 2. accepted; 3. denied
            $table->string('status')->default('saved'); // 1. saved; 2. sent

            $table->text('motivation')->nullable();
            $table->text('interests')->nullable();
            $table->text('experience')->nullable();
            $table->text('expectations')->nullable();
            $table->text('skills')->nullable();

            $table->integer('cv')->nullable();
            $table->integer('motivation_letter')->nullable();
            $table->integer('other')->nullable();

            $table->tinyInteger('checked')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs__applications');
    }
};
