<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company_name');
            $table->string('image');
            $table->text('job_summary');
            $table->date('published_on');
            $table->integer('vacancy');
            $table->enum('employment_status', ['Full-time', 'Part-time']);
            $table->string('experience');
            $table->string('job_location');
            $table->string('salary');
            $table->enum('gender', ['Any', 'Male', 'Female'])->default('Any');
            $table->date('application_deadline');
            $table->string('region_or_remote');
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
