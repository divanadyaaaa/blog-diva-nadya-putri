<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'name',
        'comment',
    ];

    // Relasi: Comment ini milik 1 Article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
