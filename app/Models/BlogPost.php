<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class BlogPost extends Model
{
    use HasFactory, Prunable;

    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];

        /**
     * Get the prunable model query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function prunable()
    {
        return static::all();
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
