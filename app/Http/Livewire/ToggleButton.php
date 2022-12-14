<?php
//Created by Jasmína Csalová

namespace App\Http\Livewire;

use App\Models\Listing;
use App\Models\User;
use App\Models\Team;
use Livewire\Component;

class ToggleButton extends Component
{
    public User $user;

    public Team $team;

    public Listing $listing;

    public $field;

    public $is_approved;

    public function mount(){
        if ($this->listing->collective) {
            $this->is_approved = (bool) $this->team->participate_listings()->where('listing_id', $this->listing->id)->first()->pivot->is_approved;
        }else {
            $this->is_approved = (bool) $this->user->participate_listings()->where('listing_id', $this->listing->id)->first()->pivot->is_approved;            
        }
    }

    public function updating($field, $value){
        if ($this->listing->collective) {
            if($value == 1){
                $this->team->participate_listings()->updateExistingPivot($this->listing->id,[$this->field => 1]);
            }else{
                $this->team->participate_listings()->updateExistingPivot($this->listing->id,[$this->field => 0]);
            }
        }else{
            if($value == 1){
                $this->user->participate_listings()->updateExistingPivot($this->listing->id,[$this->field => 1]);
            }else{
                $this->user->participate_listings()->updateExistingPivot($this->listing->id,[$this->field => 0]);
            }

        }
    }

    public function render(){
        return view('livewire.toggle-button');
    }
}
