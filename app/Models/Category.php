<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
    ];

    // Relasi: Category ini dimiliki oleh 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Category ini punya banyak Article
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
