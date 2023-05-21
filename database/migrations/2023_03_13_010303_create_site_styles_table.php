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
        Schema::create('site_styles', function (Blueprint $table) {
            $table->id();
            $table->integer('font_size')->default(14)->nullable(false);
            $table->enum('main_color', ['agua', 'bosque', 'trovao', 'fogo', 'neve'])->default('agua')->nullable(false);
            $table->enum('theme', ['diurno', 'vespertino', 'noturno'])->default('diurno')->nullable(false);
            $table->bigInteger('user_id')->unsigned()->unique()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_styles');
    }
};