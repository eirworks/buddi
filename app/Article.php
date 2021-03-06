<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $casts = [
        'data' => 'array',
        'published' => 'boolean'
    ];

    protected $fillable = [
        'title', 'slug', 'content', 'content_md', 'data', 'published', 'user_id', 'category_id'
    ];

    protected $attributes = [
        'reads' => 0,
        'category_id' => 0,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
