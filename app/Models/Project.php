<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Interest;

class Project extends Model
{
    protected $fillable = [
        'title',
        'image',
        'video',
        'category',
        'views',
    ];

    public function interests()
    {
        return $this->hasMany(Interest::class);
    }
}
