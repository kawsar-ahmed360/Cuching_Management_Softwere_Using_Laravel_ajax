<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_details extends Model
{
    protected $table='student_details';

    protected $fillable =[
       'student_id',
       'class_id',
       'courch_id',
       'batch_id',
       'roll_number',
       'type_status',
    ];
}
