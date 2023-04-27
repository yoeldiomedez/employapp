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
            $table->char('dni', 8)->unique();
            $table->string('name');
            $table->string('paternal_surname');	
            $table->string('maternal_surname');
            $table->date('birth_date');
            $table->enum('gender', ['F', 'M'])->comment('F = FEMENINO, M = MASCULINO');
            $table->string('email')->unique();
            $table->string('profile_picture', 45)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedTinyInteger('applying')->default(0)->comment('1 = POSTULANDO, 0 = DISPONIBLE');
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
    }
};
