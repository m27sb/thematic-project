<?php

namespace App\Http\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use App\Models\User;

class Search extends Component
{
    public $search = '';
    public $popup = false;
    public Collection $results;

    protected $listeners = ['searchUpdated'];

    public function mount()
    {
        $this->results = collect();
    }

    public function searchUpdated($query)
    {
        $this->search = $query;
        if (strlen($this->search) > 2) {
            $this->results = User::where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
                ->orWhere('username', 'like', "%{$this->search}%")
                ->get();
        } else {
            $this->results = collect();
        }

//        $this->results ? $this->popup = true : $this->popup = false;

        if(!$this->results->isEmpty()) {
            $this->popup = true;
        } else {
            $this->popup = false;
        }
    }

    public function render()
    {
        return view('livewire.search');
    }
}
