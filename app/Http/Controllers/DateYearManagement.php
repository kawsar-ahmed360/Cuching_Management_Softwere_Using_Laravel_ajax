<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\years;
class DateYearManagement extends Controller
{
    public function YeaSet(){

    	$current = date('Y');

    	$chec = years::where('year',$current)->get();

    	if (count($chec)>0) {


    		    echo "error";
          $notification = array(
          'message'=>'Already Years Added!!!',
          'alert-type'=>'error',
      );
    		 return redirect()->route('home')->with($notification);

    	}else{

    		$ye = new years();
    		$ye->year = $current;
    		$ye->status = 1;

    		$ye->save();


    	}

    	if ($ye->save()) {
          echo "success";
          $notification = array(
          'message'=>'successfully Year Addded',
          'alert-type'=>'success',
          );
        }
    	

    	return redirect()->route('home')->with($notification);
    }
}
