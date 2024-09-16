<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'title_first_color',
        'title_second_color',
        'display',
    ];

    public function content(){
        return $this->hasMany(ContentResume::class);
    }
}
