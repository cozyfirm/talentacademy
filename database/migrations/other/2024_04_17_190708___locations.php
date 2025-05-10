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
        Schema::create('__locations', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('address');
            $table->string('city');
            $table->integer('country');

            $table->string('location');

            /* Images */
            $table->string('map_img')->nullable();
            $table->string('main_img')->nullable();
            $table->string('cover_img')->nullable();

            $table->text('description');
            $table->tinyInteger('public')->default(1);
            $table->tinyInteger('active')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('__locations');
    }
};
