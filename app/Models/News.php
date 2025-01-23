<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";

    protected $fillable = [
        'name',
        'event_date',
        'message',
        'user_id',
        'images',
    ];

    protected $casts = [
        'images' => 'array', // Если вы храните изображения в формате JSON
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(NewsCategory::class, 'news_has_categories', 'news_id', 'news_category_id');
    }
}
