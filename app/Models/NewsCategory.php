<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = "news_categories";

    protected $fillable = [
        'name',
        'parent_id',
        'lft',
        'rgt',
        'depth',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot() { 
        parent::boot(); 
        
        static::creating(function ($model) { 
            $model->setNestedSetFields(); 
        }); 
        
        static::updating(function ($model) { 
            $model->setNestedSetFields(); 
        }); 
    }

    public function setNestedSetFields() { 
        if (!$this->parent_id) { 
            $this->lft = 1; 
            $this->rgt = 2; 
            $this->depth = 0; 
        } else { 
            $parent = self::find($this->parent_id); 
            $this->depth = $parent->depth + 1; 
            $this->lft = $parent->rgt; 
            $this->rgt = $this->lft + 1;

            self::where('rgt', '>=', $parent->rgt)->increment('rgt', 2); 
            self::where('lft', '>', $parent->rgt)->increment('lft', 2); 
        } 
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_has_categories', 'news_category_id', 'news_id');
    }
}
