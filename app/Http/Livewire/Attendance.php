<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use DB;

class Attendance extends Component
{
    public $status;

    public function render()
    {
        return view('livewire.attendance');
    }

    public function store()
    {
        $update = DB::table('attendance')
                            ->where('apprentice_id', Auth::user()->apprenticeDetail->id)
                            ->update(['status_early' => $this->status]);
        
        if($update){
            session()->flash('success', 'success');
            session()->flash('title', 'Berhasil');
            session()->flash('message', 'Status Berhasil Diperbaharui');
            return redirect()->to('/attendance');
        }else{
            session()->flash('gagal', 'gagal');
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Gagal');
        }
    }
}
