<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    //
    protected $table = 'attendance';
    protected $fillable = ['apprentice_id', 'date_att', 'first_timesheet', 'last_timesheet', 'status_finish'];
}