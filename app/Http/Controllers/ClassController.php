<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\classes;
use App\Http\Requests\ClassesRequest;
class ClassController extends Controller
{
    public function classList(){
       
       $data['class'] = classes::get();
    	return view('backend/setting/class/view',$data);
    }

    public function classListAjax(){
       
       $data['class'] = classes::get();

    	return view('backend/setting/class/view_ajax',$data);
    }

    public function classListSave(Request $Request){

    	$Request->validate([
          'class_name'=>'required|unique:classes,class_name',
    	]);

    	if ($Request->ajax()) {
    		
    		$c = new classes();
    		$c->class_name = $Request->class_name;
    		$c->status = 1;
    		$c->save();
    	}
    }

    public function classListAjaxaActive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = classes::find($Request->ClasId);
    		$a->status=2;
    		$a->save();
    	}
    } 

     public function classListAjaxaDeactive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = classes::find($Request->ClasId);
    		$a->status=1;
    		$a->save();
    	}
    } 

      public function classListAjaxaDelete(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = classes::find($Request->ClasId);
    		$a->delete();
    	}
    }

    public function classListAjaxaEdite(ClassesRequest $Request){
              
              if ($Request->ajax()) {
              	
              	$edite = classes::find($Request->UserId);

              	$edite->class_name = $Request->class_name;
              	$edite->save();
              }
 
    }
}
