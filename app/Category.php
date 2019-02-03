<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'data', 'image'
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
