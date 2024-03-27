<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'content',
        'image',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter(Builder $bulider , $filters)
    {

        if ($filters['title'] ?? false ) {
            $bulider->where('title', 'LIKE', "%{$filters['title']}%");
        }
        if ($filters['name'] ?? false ) {
            $bulider->where('category_id', '=', $filters['name']);
        }

        
      

    }
}
