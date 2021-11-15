<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
                        ->as('subscriptions')
                        ->withTimeStamps();
    }
}
