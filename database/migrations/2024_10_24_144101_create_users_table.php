<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('designation')->nullable(); // Tornado opcional para empresas ou admins
            $table->string('password');
            $table->string('email')->unique();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('picture')->nullable();
            $table->string('cv')->nullable();

            // Campos adicionados para novos requisitos
            $table->enum('role', ['aluno', 'empresa', 'admin'])->default('aluno');
            $table->string('area_interesse')->nullable(); // Específico para alunos
            $table->integer('graduation_year')->nullable(); // Renomeado para 'graduation_year' e definido como inteiro
            $table->json('company_details')->nullable(); // Dados JSON para empresas

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
