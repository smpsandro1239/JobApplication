<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'description' => 'Senior Developer',
                'designation' => 'Developer',
                'password' => bcrypt('password'),
                'email' => 'johndoe@example.com',
                'facebook' => 'https://facebook.com/johndoe',
                'linkedin' => 'https://linkedin.com/in/johndoe',
                'twitter' => 'https://twitter.com/johndoe',
                'picture' => 'images/users/johndoe.png',
                'cv' => 'documents/cvs/johndoe.pdf',
                'role' => 'aluno', // Definindo o papel como 'aluno'
                'graduation_year' => 2025, // Adicionando o ano de conclusão
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'description' => 'Project Manager',
                'designation' => 'Manager',
                'password' => bcrypt('password'),
                'email' => 'janesmith@example.com',
                'facebook' => 'https://facebook.com/janesmith',
                'linkedin' => 'https://linkedin.com/in/janesmith',
                'twitter' => 'https://twitter.com/janesmith',
                'picture' => 'images/users/janesmith.png',
                'cv' => 'documents/cvs/janesmith.pdf',
                'role' => 'empresa', // Definindo o papel como 'empresa'
                'graduation_year' => null, // Sem ano de conclusão para empresas
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mike Johnson',
                'description' => 'Data Analyst',
                'designation' => 'Analyst',
                'password' => bcrypt('password'),
                'email' => 'mikejohnson@example.com',
                'facebook' => 'https://facebook.com/mikejohnson',
                'linkedin' => 'https://linkedin.com/in/mikejohnson',
                'twitter' => 'https://twitter.com/mikejohnson',
                'picture' => 'images/users/mikejohnson.png',
                'cv' => 'documents/cvs/mikejohnson.pdf',
                'role' => 'aluno',
                'graduation_year' => 2026, // Adicionando o ano de conclusão
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sarah Lee',
                'description' => 'Marketing Specialist',
                'designation' => 'Marketing',
                'password' => bcrypt('password'),
                'email' => 'sarahlee@example.com',
                'facebook' => 'https://facebook.com/sarahlee',
                'linkedin' => 'https://linkedin.com/in/sarahlee',
                'twitter' => 'https://twitter.com/sarahlee',
                'picture' => 'images/users/sarahlee.png',
                'cv' => 'documents/cvs/sarahlee.pdf',
                'role' => 'aluno',
                'graduation_year' => 2025, // Adicionando o ano de conclusão
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'David Brown',
                'description' => 'Frontend Developer',
                'designation' => 'Developer',
                'password' => bcrypt('password'),
                'email' => 'davidbrown@example.com',
                'facebook' => 'https://facebook.com/davidbrown',
                'linkedin' => 'https://linkedin.com/in/davidbrown',
                'twitter' => 'https://twitter.com/davidbrown',
                'picture' => 'images/users/davidbrown.png',
                'cv' => 'documents/cvs/davidbrown.pdf',
                'role' => 'aluno',
                'graduation_year' => 2024, // Adicionando o ano de conclusão
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Continue criando registros para os demais usuários necessários
        ]);
    }
}
