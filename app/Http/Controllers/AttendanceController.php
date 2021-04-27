<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{TeamApprentice, Jss, Apprentice, Attendance};

class AttendanceController extends Controller
{
    public function index() {
        if(isset(Auth::user()->apprenticeTeam)) {
            if(Auth::user()->apprenticeTeam->status_hired == "DI TOLAK" || 
               Auth::user()->apprenticeTeam->status_hired == "SEDANG DIPROSES") {
                return responsea(abort(403));
            } else {
                $absen = Attendance::where('apprentice_id',Auth::user()->apprenticeDetail->id)->with('apprentice')->get();
                // $absen = Attendance::find(Auth::user()->apprenticeDetail->id)->apprentice_id;
                return view("pages.dashboard.attendance.index")->with(compact('absen'));
            }
        } else {
            $team = TeamApprentice::all();
            return view("pages.dashboard.attendance.index")->with(compact('team'));
        } 
    }

    public function detail($id){
        if (!\Auth::user()->adminDetail) {
            return response(abort(403));
        }else {
            $apprentice = Apprentice::where('team_apprentice_id',$id)->get();
            return view('pages.dashboard.attendance.detail')->with(compact('apprentice'));
        }
    }
}
