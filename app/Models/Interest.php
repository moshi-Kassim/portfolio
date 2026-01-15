<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = [
        'project_id',
        'name',
        'email',
        'message',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

