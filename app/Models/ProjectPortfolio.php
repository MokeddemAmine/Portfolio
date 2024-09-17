<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPortfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'portfolio_id',
        'project_id',
    ];
}
