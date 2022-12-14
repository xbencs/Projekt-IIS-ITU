<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'tournament_id',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relationships with listings
    public function listings(){
        return $this->hasMany(Listing::class, 'user_id');
    }

    public function member()
    {
        return Team::find(auth()->user()->current_team_id);
        // return $this->belongsTo(Team::class, 'current_team_id');
    }
    //Relationships:  one user(player) can participate in many tournaments (listings)
    public function participate_listings(){
        return $this->belongsToMany(Listing::class, 'listing_user')->withPivot('is_approved');
    }
}
