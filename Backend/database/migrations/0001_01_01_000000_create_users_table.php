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
            $table->string('code',14)->unique();
            $table->string('name',150);
            $table->string('lastname',150);
            $table->string('email',150)->unique();
            $table->string('phone', 15)->unique();
            $table->string('username',25);
            $table->string('password');
            $table->integer('id_position');
            $table->integer('id_rol');
            $table->rememberToken();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
//        Schema::dropIfExists('password_reset_tokens');
//        Schema::dropIfExists('sessions');
    }
};
