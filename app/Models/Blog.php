<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use HasFactory,sluggable;
    protected $fillable = [
        'picture',
        'title',
        'content',
        'main_page',
    ];

    public function sluggable():array{
        return [
            'slug'  => [
                'source'    => 'title',
            ]
        ];
    }

    public function categories(){
        return $this->belongsToMany(BlogCategory::class,'blog_relatings');
    }
}
