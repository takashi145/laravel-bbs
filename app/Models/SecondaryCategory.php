<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryCategory extends Model
{
    use HasFactory;

    public function primary_category() {
        return $this->belongsTo(PrimaryCategory::class);
    }

    public function threads() {
        return $this->hasMany(Thread::class);
    }
}
