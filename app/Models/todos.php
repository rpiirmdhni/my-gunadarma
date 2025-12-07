<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Nama class diubah dari 'todos' ke 'Todo' (Singular, Kapital)
class todos extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'desc',
        'priority',
        'deadline',
        'status',
    ];

    protected $casts = [
        'deadline' => 'datetime', // Otomatis mengubah string jadi objek Carbon
    ];
}