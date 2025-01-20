<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    protected $table = 'gambars';
    protected $primaryKey = 'id_gambar';
    
    protected $fillable = [
        'file_name',
        'keterangan'
    ];
}