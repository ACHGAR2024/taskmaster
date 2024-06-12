<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('index')->default(0); // Ajouter une valeur par défaut
            $table->timestamps();
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('columns');
    }
};