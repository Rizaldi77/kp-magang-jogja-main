<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use Illuminate\Support\Facades\Auth;
class AbsenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function timeZone($location){
        return date_default_timezone_set($location);
    }
   
    public function index()
    {
        $this->timeZone('Asia/Jakarta');
        $apprentice_id = Auth::user()->id;
        $date_att = date("Y-m-d");
        $cek_absen = Absen::where(['apprentice_id' => $apprentice_id, 'date_att' => $date_att])
                            ->get()
                            ->first();
        if (is_null($cek_absen)) {
            $info = array(
                "status" => "Anda belum mengisi absensi!",
                "btnIn" => "",
                "btnOut" => "disabled");
        } elseif ($cek_absen->last_timesheet == NULL) {
            $info = array(
                "status" => "Jangan lupa absen keluar",
                "btnIn" => "disabled",
                "btnOut" => "");
        } else {
            $info = array(
                "status" => "Absensi hari ini telah selesai!",
                "btnIn" => "disabled",
                "btnOut" => "disabled");
        }

        $data_absen = Absen::where('apprentice_id', $apprentice_id)
                        ->orderBy('last_timesheet', 'desc')
                        ->paginate(20);
        return view('absen', compact('data_absen', 'info'));
    }

    public function absen(Request $request){
        $this->timeZone('Asia/Jakarta');
        $apprentice_id = Auth::user()->id;
        $date_att = date("Y-m-d"); // 2017-02-01
        $time = date("H:i:s"); // 12:31:20
        $status_finish = $request->status_finish;

        $apprentice = new Absen;
        // absen masuk

        if (isset($request->btnIn)){
             //cek double data
            $cek_double = $apprentice->where(['date_att'=> $date_att, 'apprentice_id' => $apprentice_id])->count();
            
            if ($cek_double >0 ){
                return redirect()->back();
            }

            $apprentice->create([
                'apprentice_id'   => $apprenticer_id,
                'date_att'      => $date_att,
                'first_timesheet'   => $first_timesheet,
                'status_finish'      => $status_finish]);

            return redirect()->back();

        } //absen keluar 
        elseif (isset($request->btnOut)){
            $apprentice->where(['date' => $date_att, 'apprentice_id' => $apprentice_id])
                ->update([
                    'last_timesheet' => $time,
                    'status_finish'     => $status_finish]);
            return redirect()->back();       
        }
       
        return $request->all();
    }
}
