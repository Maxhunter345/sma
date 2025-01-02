<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi'; // Menentukan nama tabel yang benar
    
    protected $fillable = [
        'title',
        'image',
        'additional_images',
        'content',
        'writer_name',
        'day'
    ];
    
    protected $casts = [
        'additional_images' => 'array'
    ];
}