<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'thread_id',
        'comment_id',
        'comment',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
