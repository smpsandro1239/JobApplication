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
            $table->date('expires_at');  // Data de caducidade da oferta
            $table->boolean('notified_expiration_soon')->default(false); // Indica se a notificação de expiração iminente foi enviada
            $table->date('renewable_until')->nullable(); // Data limite até quando a oferta pode ser renovada
            $table->string('region_or_remote');
            $table->string('category')->nullable(); // Categoria da oferta
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
