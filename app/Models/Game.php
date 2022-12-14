<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_team_id' => 'required',
        'second_team_id' => 'required',
        'first_score' => 'required',
        'second_score' => 'required',
        'listing_id' => 'required'
    ];

    protected $visible = ['first_team_id', 'second_team_id', 'first_score', 'second_score'];


    /**
     * Get the first that owns the Game
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function first(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'first_team_id');
    }
    /**
     * Get the second that owns the Game
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function second(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'second_team_id');
    }

    /**
     * Get the tournament that owns the Game
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id');
    }
}
