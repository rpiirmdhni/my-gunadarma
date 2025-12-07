<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Menggunakan nama Model singular 'Digibook'
// yang otomatis terhubung ke tabel plural 'digibooks'
class Digibooks extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'writter',
        'publisher',
        'coverimg_path',
        'file_path',
    ];
}