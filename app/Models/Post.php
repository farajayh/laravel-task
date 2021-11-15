<?php

namespace App\Models;

use App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
