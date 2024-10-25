<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedJob extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public $timestamps = false;

    // Add fillable properties
    protected $fillable = [
        'user_id',  // Allow mass assignment for user_id
        'job_id',
        'saved_on',
    ];
}
