<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schools extends Model
{
    protected $table ='schools';

    protected $fillable = [
    'school_name',
    'status',
    ];
}
