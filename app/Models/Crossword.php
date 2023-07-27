<?php

namespace App\Models;

use App\Models\Source\Direction;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Crossword
 *
 * @property int $id
 * @property string $answer
 * @property string $clue
 * @property string $length
 * @property \Illuminate\Support\Carbon $date
 * @property Direction $direction
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Crossword newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Crossword newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Crossword query()
 * @method static \Illuminate\Database\Eloquent\Builder|Crossword whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crossword whereClue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crossword whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crossword whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crossword whereDirection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crossword whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crossword whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crossword whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Crossword extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string[]
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'direction' => Direction::class,
        'date' => 'date:Y-m-d'
    ];
}
