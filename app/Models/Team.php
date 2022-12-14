<?php
//Created by Jasmína Csalová

namespace App\Models;
use Illuminate\Http\UploadedFile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'players_count',
        'description',
        'owner_id',
    ];

    // A team can have many members.
	public function members()
	{
        return $this->hasMany(User::class, 'team_user')
            ->withPivot(['is_admin']);
	}

	// A team can be signed-up for many tournaments.
    public function participate_listings(){
        return $this->belongsToMany(Listing::class, 'listing_team')->withPivot('is_approved');
    }
}
