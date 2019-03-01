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

    public function getPublishedArticlesAttribute()
    {
        return $this->articles()->where('published', true)
            ->limit(5)
            ->get();
    }

    public function publishedArticles($limit = 5)
    {
        return $this->articles()->where('published', true)
            ->limit($limit)
            ->latest()
            ->get();
    }
}
