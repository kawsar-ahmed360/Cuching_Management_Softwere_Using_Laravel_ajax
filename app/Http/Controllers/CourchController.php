<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\courchs;
use App\classes;
use DB;
class CourchController extends Controller
{
    public function CourchList(){
          
          $data['courch'] = DB::table('courchs')
                           ->join('classes','courchs.class_id','classes.id')
                           ->select('courchs.*','classes.class_name')
                           ->get();

          $data['class'] = classes::get();
    	return view('backend/setting/courch/view',$data);
    } 

     public function CourchListAjax(){
         
           $data['courch'] = DB::table('courchs')
                           ->join('classes','courchs.class_id','classes.id')
                           ->select('courchs.*','classes.class_name')
                           ->get();

    	return view('backend/setting/courch/view_ajax',$data);
    }

    public function CourchSave(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = new courchs();
    		$a->class_id = $Request->class_id;
    		$a->courch_type = $Request->courch_type;
    		$a->status = 1;
    		$a->save();

    	return $this->CourchListAjax($Request);	
    	}
    }

    public function CourchListAjaxActive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = courchs::find($Request->CourcId);
    		$a->status =2;
    		$a->save();

    		return $this->CourchListAjax($Request);	
    	}
    }

     public function CourchListAjaxDeactive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = courchs::find($Request->CourcId);
    		$a->status =1;
    		$a->save();

    		return $this->CourchListAjax($Request);	
    	}
    }  

     public function CourchListAjaxDelete(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = courchs::find($Request->CourcId);
    		$a->delete();

    		return $this->CourchListAjax($Request);	
    	}
    }

    public function CourchListAjaxEdite(Request $Request){

    	if ($Request->ajax()) {
    		
    		$d = courchs::find($Request->UserId);
    		$d->class_id = $Request->class_id;
    		$d->courch_type = $Request->courch_type;
    		$d->save();

    		return $this->CourchListAjax($Request);	
    	}
    }

  
}
