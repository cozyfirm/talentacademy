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
        Schema::create('blog', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('short_desc');
            $table->text('description');
            $table->integer('category')->default(0);
            $table->integer('created_by');

            $table->tinyInteger('published')->default(0);

            $table->string('main_img')->nullable();
            $table->string('img_one')->nullable();
            $table->string('img_two')->nullable();
            $table->string('img_three')->nullable();
            $table->string('video')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
