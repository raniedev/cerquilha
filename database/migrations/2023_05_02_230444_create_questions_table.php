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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable(false);
            $table->bigInteger('video_id')->unsigned()->nullable(false);
            $table->string('post', 1000)->nullable(false);
            $table->bigInteger('answer')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullable(false)->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('videos')->nullable(false)->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
