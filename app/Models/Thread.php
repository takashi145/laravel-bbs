<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "image",
        "secondary_category_id",
        "title",
        "body"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function secondary_category() {
        return $this->belongsTo(SecondaryCategory::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
