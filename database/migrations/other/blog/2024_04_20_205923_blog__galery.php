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
        Schema::create('blog__galery', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('blog_id');
            $table->foreign('blog_id')
                ->references('id')
                ->on('blog')
                ->onDelete('cascade');
            $table->integer('file_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog__galery');
    }
};
