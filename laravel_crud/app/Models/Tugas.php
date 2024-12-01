<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tugas';
    protected $fillable = [
        'id',
        'judul_tugas',
        'deskripsi',
        'tanggal',
        'status',
        'user_id',
    ];
}
