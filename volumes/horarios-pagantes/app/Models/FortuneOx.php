<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FortuneOx extends Model
{
    use HasFactory;
    use HasTimestamps;

    protected $table = 'fortune_oxs';

    protected $fillable = [
        'data',
        'porcentagem',
        'hora',
        'horarios',
    ];}
