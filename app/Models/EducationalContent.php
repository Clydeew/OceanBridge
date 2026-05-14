<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationalContent extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
    ];
}
