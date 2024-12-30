<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $fillable = [
        'title',
        'author',
        'description',
        'category',
        'cover_image',
        'file_path'
    ];
}