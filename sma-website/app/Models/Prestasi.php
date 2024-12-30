<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = [
        'title',
        'image',
        'content'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $table = 'prestasi';
}