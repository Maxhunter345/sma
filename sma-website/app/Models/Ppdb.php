<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    protected $fillable = [
        'nisn',
        'name',
        'asal_sekolah'
    ];

    protected $table = 'ppdb';
}