<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        // dd($users);
        return $this->belongsTo(User::class);
    }
}
