<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courchs extends Model
{
       
     protected $table = 'courchs';  

    protected $fillable = [
 'class_id',
'courch_type',
'status',
    ];
}
