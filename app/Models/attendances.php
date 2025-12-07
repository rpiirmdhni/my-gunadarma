<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class attendances extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'user_id', // Ini akan kita gunakan sebagai Foreign Key (NPM Mahasiswa)
        'courseschedule_id',
        'status',
    ];

    public function courseSchedule(): BelongsTo
    {
        return $this->belongsTo(Courses_Schedule::class, 'courseschedule_id');
    }
}