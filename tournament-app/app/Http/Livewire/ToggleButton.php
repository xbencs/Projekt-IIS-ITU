<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use App\Models\User;
use Livewire\Component;

class ToggleButton extends Component
{
    public User $user;

    public Listing $listing;

    public $field;

    public $is_approved;

    public function mount(){
        $this->is_approved = (bool) $this->user->participate_listings()->where('listing_id', $this->listing->id)->first()->pivot->is_approved;
    }

    public function updating($field, $value){
        if($value == 1){
            $this->user->participate_listings()->updateExistingPivot($this->listing->id,[$this->field => 1]);
        }else{
            $this->user->participate_listings()->updateExistingPivot($this->listing->id,[$this->field => 0]);
        }
    }

    public function render(){
        return view('livewire.toggle-button');
    }
}
