<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MrHallowWin extends Model
{
    use HasFactory;
    use HasTimestamps;

    protected $fillable = [
        'data',
        'porcentagem',
        'hora',
        'horarios',
    ];
}
