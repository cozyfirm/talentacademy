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
        Schema::create('chat__messages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('conversation_id');
            $table->foreign('conversation_id')
                ->references('id')
                ->on('chat__conversations')
                ->onDelete('cascade');
            $table->unsignedBigInteger('sender_id');
            $table->text('body');
            $table->tinyInteger('read')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat__messages');
    }
};
