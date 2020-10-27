<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attendances extends Model
{
    protected $table='attendances';

    protected $fillable = [
      'academinc_session',
     'student_id',
     'class_id',
     'courch_id',
     'batch_id',
     'attendance',
     'status',
    ];
}
