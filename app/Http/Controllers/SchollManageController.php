<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\schools;
class SchollManageController extends Controller
{
    public function schoolView(){

      $data['school'] =schools::get();

    	return view('backend/setting/school/view',$data);
    }



    public function schoolViewajax(){
      
      $data['school'] =schools::get();

    	return view('backend/setting/school/view_ajax',$data);

    }

    public function schoolSave(Request $Request){

    	$Request->validate([
        'school_name'=>'required'
    	]);

    	if ($Request->ajax()) {
    		
    		 $school = new schools();
    		 $school->school_name = $Request->school_name;
    		 $school->status = 1;
    		 $school->save();
    	}
    }

    public function schoolactive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a =schools::find($Request->UserId);

    		$a->status = 2;
    		$a->save();
    	}
    }

    public function schoolDeactive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$d=schools::find($Request->UserId);
    		$d->status=1;
    		$d->save();
    	}
    }

    public function schoolEdite(Request $Request){

    	if ($Request->ajax()) {
    		
    		$edite = schools::find($Request->UserId);

    		$edite->school_name = $Request->school_name;
    		$edite->save();
    	}
    }

    public function schoolDelete(Request $Request){
    	if ($Request->ajax()) {
    		
    		$dele = schools::find($Request->UserId);
    		$dele->delete();
    	}
    }
}
