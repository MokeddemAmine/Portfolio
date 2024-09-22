<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogRelating extends Model
{
    use HasFactory;
    protected $fillable = [
        'blog_id',
        'blog_category_id',
    ];
}
