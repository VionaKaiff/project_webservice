<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $table = 'modul';
    protected $fillable = [
        'id',
        'judul_modul',
        'deskripsi_modul',
        'modul',
    ];
}
