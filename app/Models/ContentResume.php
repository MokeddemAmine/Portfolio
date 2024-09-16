<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentResume extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sub_title',
        'level',
        'resume_id',
    ];
}
