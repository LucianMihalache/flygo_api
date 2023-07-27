<?php

namespace App\Models;

use App\Models\Source\Direction;
use Illuminate\Database\Eloquent\Model;

class Crossword extends Model
{
    protected $casts = [
        'direction' => Direction::class
    ];
}
