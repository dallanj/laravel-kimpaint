<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'is_default_home',
        'is_default_not_found',
    ];

    protected $casts = [
        'is_default_home' => 'boolean',
        'is_default_not_found' => 'boolean',
    ];
}
