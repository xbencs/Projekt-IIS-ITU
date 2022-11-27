<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'players_count',
        'description',
        'owner_id'
    ];

    // A team can have many members.
	public function members()
	{
        return $this->belongsToMany(User::class, 'team_user')
            ->withPivot(['is_admin']);
	}

	// A team can be signed-up for many tournaments.
	public function tournaments()
	{
		return $this->belongsToMany(Listing::class, 'team_tournament')
            ->withPivot(['checked_in', 'disqualified']);
	} 
    
}
