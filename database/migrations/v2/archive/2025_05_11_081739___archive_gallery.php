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
        Schema::create('__archive_gallery', function (Blueprint $table) {
            $table->id();

            $table->integer('season_id');
            $table->string('file');
            $table->string('name');
            $table->string('ext', 10);
            $table->string('path')->default('files/archive/gallery');
            $table->string('size')->default('0Mb');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('__archive_gallery');
    }
};
