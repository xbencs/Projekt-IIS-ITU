<?php
//TODO:

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    //protected $fillable = ['company','title', 'location', 'email', 'website', 'tags', 'descriptions']; --> done in AppServiceProvider

    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%'); // filter with tag, percentage represents anything can be before or after tag
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%') 
            -> orWhere('descriptions', 'like', '%' . request('search') . '%')
            -> orWhere('sport', 'like', '%' . request('search') . '%');
        }
    }

    // relationships to user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function Game(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    // users in the tournaments
    public function participated_users(){
        return $this->belongsToMany(User::class, 'listing_user')->withPivot('is_approved');
    }

    public function participated_teams(){
        return $this->belongsToMany(Team::class, 'listing_team')->withPivot('is_approved');
    }

    public function approved_teams(){
        return $this->belongsToMany(Team::class, 'listing_team')->withPivot('is_approved')->wherePivot('is_approved', '=', 1);
    }
    public function approved_users(){
        return $this->belongsToMany(User::class, 'listing_user')->withPivot('is_approved')->wherePivot('is_approved', '=', 1);
    }
}
