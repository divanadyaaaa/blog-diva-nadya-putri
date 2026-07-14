<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'thumbnail',
        'status',
    ];

    // Relasi: Article ini milik 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Article ini milik 1 Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    // Relasi: Article ini punya banyak Comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
