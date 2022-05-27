<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function blog() {
        return $this->belongsTo(BlogPost::class);
    }

    protected $fillable = [
        'content',
        'blog_post_id',
        'user_id',
        'parent_id'
    ];

    public function parentComment() {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function childComments() {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    } 

    public function post() {
        return $this->belongsTo(BlogPost::class);
    }
}
