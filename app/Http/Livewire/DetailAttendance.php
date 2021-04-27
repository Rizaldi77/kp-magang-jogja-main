<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{TeamApprentice,Apprentice};

class DetailAttendance extends Component
{
    public $apprentice, $searchTerm, $selectApprentice, $select, $team_id;

    public function mount($data)
    {
        $this->apprentice = $data;
        $this->select = $data;
        $this->team_id = $data[0]->team_apprentice_id;
    }

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        // $apprentice = $this->selectApprentice;
        // $this->submission = Apprentice::where('university','like',$searchTerm)->get();
        if($this->selectApprentice != null) {
            $this->apprentice = Apprentice::where('id',$this->selectApprentice)->get();
        }else {
            $this->apprentice = Apprentice::where('team_apprentice_id',$this->team_id)->get();
        }
        return view('livewire.detail-attendance');
    }
}
