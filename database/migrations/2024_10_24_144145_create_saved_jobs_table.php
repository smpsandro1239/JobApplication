<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSavedJobsTable extends Migration
{
    public function up()
    {
        Schema::create('saved_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');
            $table->timestamp('saved_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('note')->nullable(); // Campo opcional para uma nota ou comentário sobre o emprego salvo
        });
    }

    public function down()
    {
        Schema::dropIfExists('saved_jobs');
    }
}
