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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable(false);
            $table->string('title')->nullable(false);
            $table->string('description', 1000)->nullable(false);
            $table->enum('discipline', ['Português', 'Inglês', 'Espanhol', 'Matemática', 'Geometria', 'Física', 'Química', 'Biologia', 'História', 'Geografia', 'Música', 'Filosofia', 'Sociologia', 'Informática', 'Artes'])->nullable(false);
            $table->enum('class', [501, 502, 601, 602, 701, 702, 801, 802, 901, 902, 1001, 1002, 2001, 2002, 3001, 3002])->nullable(false);
            $table->boolean('internal')->nullable(false);
            $table->longText('video')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')->nullable(false)->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
