<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table        = "attendance";
    public $timestamps      = false;
    protected $fillable     = [ 
        'id',
        'date_att', 
        'apprentice_id',
        'first_timesheet',
        'last_timesheet',
        'status_early',
        'status_finish'
    ];

    public function apprentice()
    {
        return $this->hasOne(apprentice::class, 'id');
    }

    public function apprenticeTeam()
    {
        return $this->hasManyThrough(TeamApprentice::class, Apprentice::class, 'id','team_apprentice_id','id');
    }
}
