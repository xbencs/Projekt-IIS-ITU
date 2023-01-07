<?php
//Created by Jasmína Csalová

namespace App\Http\Livewire;

use console;
use Livewire\Component;
use App\Models\Announcement;
  
class Announcements extends Component
{
    public $announcements, $title, $body, $announcement_id;
    public $updateMode = false;

    public function index(){
        return view('components.welcome');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->announcements = Announcement::all();
        return view('livewire.announcements');
        /*return view('livewire.announcements', [
            'announcements' => Announcement::all()
        ]);*/
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        if(auth()->user()->is_admin != 1){
            abort(403, 'Unathorized Action');
        }
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
  
        Announcement::create($validatedDate);
  
        session()->flash('message', 'Announcement Created Successfully.');
  
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        if(auth()->user()->is_admin != 1){
            abort(403, 'Unathorized Action');
        }

        $announcement = Announcement::findOrFail($id);
        $this->announcement_id = $id;
        $this->title = $announcement->title;
        $this->body = $announcement->body;
  
        $this->updateMode = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        if(auth()->user()->is_admin != 1){
            abort(403, 'Unathorized Action');
        }
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
  
        $announcement = Announcement::find($this->announcement_id);
        $announcement->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Announcement Updated Successfully.');
        $this->resetInputFields();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        if(auth()->user()->is_admin != 1){
            abort(403, 'Unathorized Action');
        }
        Announcement::find($id)->delete();
        session()->flash('message', 'Announcement Deleted Successfully.');
    }
}
