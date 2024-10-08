<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'link',
        'pictures',
        'main_page',
    ];

    public function section(){
        return $this->belongsToMany(Portfolio::class,'project_portfolios','project_id','portfolio_id');
    }

    public function sluggable():array{
        return [
            'slug'  => [
                'source'    => 'name',
            ]
        ];
    }
}
