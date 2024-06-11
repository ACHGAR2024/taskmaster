<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('pseudo', 255); // Ajout de la colonne 'pseudo'
            $table->string('image', 255)->nullable();
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('role', 255)->default('user');
            $table->rememberToken();
            $table->timestamps();

            $table->unsignedBigInteger('role_id')->default(2);
            $table->unsignedBigInteger('group_id')->nullable();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null');

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};