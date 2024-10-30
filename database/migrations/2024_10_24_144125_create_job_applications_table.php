<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateJobApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');
            $table->timestamp('applied_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('status', ['Pending', 'Accepted', 'Rejected'])->default('Pending');
            $table->string('cv')->nullable(); // Caminho do currículo enviado pelo candidato
            $table->text('message')->nullable(); // Mensagem opcional
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_applications');
    }
}
