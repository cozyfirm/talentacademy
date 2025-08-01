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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('api_token')->nullable();
            $table->string('fcm_token', '128')->nullable();
            $table->rememberToken();

            /* Role data */
            $table->string('role', '10')->default('user');

            /* User attributes */
            // $table->string('prefix', '10');
            $table->string('phone', 20);
            $table->date('birth_date');

            /* Home address data */
            $table->string('address', 100);
            $table->string('city', 50);
            $table->integer('country');

            /* About user - text data */
            $table->text('about')->nullable();
            /* Profile image */
            $table->string('photo_uri')->nullable();

            /* Social networks links */
            $table->string('instagram', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('twitter', 100)->nullable();
            $table->string('linkedin', 100)->nullable();
            $table->string('web', 100)->nullable();

            /* Teacher data */
            $table->string('title')->nullable();
            $table->string('institution')->nullable();
            $table->string('presenter_role', 100)->nullable();

            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('interview')->nullable();

            $table->dateTime('last_online')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
