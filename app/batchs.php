<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class batchs extends Model
{
    protected $table ='batchs';

    protected $fillable =[
        'class_id',
        'courch_id',
       'batch_name',
       'student_capaticy',
       'status',
    ];


    public function courchs(){

    	return $this->belongsTo('App\courchs','courch_id');
    }
}
