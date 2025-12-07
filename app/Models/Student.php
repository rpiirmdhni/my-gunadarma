<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory; // Tambahkan ini jika belum ada

    protected $primaryKey = 'npm';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'npm',
        'fullname',
        'major_id',
        'classroom_id',
    ];

    /**
     * Relasi BelongsTo ke Classroom.
     * Foreign key 'classroom_id' di model Student merujuk ke primary key 'id' di model Classroom.
     */
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
