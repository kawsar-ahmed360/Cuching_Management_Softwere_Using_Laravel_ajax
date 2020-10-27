<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\batchs;
use App\classes;
use App\courchs;
use DB;
class BatchManageController extends Controller
{
    public function BatchList(){
      $data['batch'] = DB::table('batchs')
                      ->join('classes','batchs.class_id','classes.id')
                      ->join('courchs','batchs.courch_id','courchs.id')
                      ->select('batchs.*','classes.class_name','courchs.courch_type')
                      ->get();

      $data['class'] = classes::get();
      $data['courch'] = courchs::get();
    	return view('backend/setting/batch/view',$data);
    } 

    public function BatchListAjax(){
          $data['batch'] = DB::table('batchs')
                      ->join('classes','batchs.class_id','classes.id')
                      ->join('courchs','batchs.courch_id','courchs.id')
                      ->select('batchs.*','classes.class_name','courchs.courch_type')
                      ->get();
    	return view('backend/setting/batch/view_ajax',$data);
    }





    public function BatchListAjaxActive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = batchs::find($Request->BatchId);

    		$a->status=2;
    		$a->save();

    		return $this->BatchListAjax($Request);
    	}
    }

    public function BatchListAjaxDeactive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$d= batchs::find($Request->BatchId);
    		$d->status=1;
    		$d->save();

    		return $this->BatchListAjax($Request);
    	}
    }

    public function BatchListAjaxDelete(Request $Request){

    	if ($Request->ajax()) {
    		
    		$de = batchs::find($Request->BatchId);
    		$de->delete();

    		return $this->BatchListAjax($Request);
    	}
    }

 

    public function CourchListAjaxCourch(Request $Request){

        if ($Request->ajax()) {
            
            $batch = courchs::where('class_id',$Request->class_id)->get();

            return response()->json($batch);
        }
    }


    public function BatchSave(Request $Request){

        if ($Request->ajax()) {
            
            $s = new batchs();
            $s->class_id = $Request->class_id;
            $s->courch_id = $Request->courch_id;
            $s->batch_name = $Request->batch_name;
            $s->student_capaticy = $Request->student_capaticy;
            $s->status = 1;

            $s->save();

            return $this->BatchListAjax($Request);
        }
    }

    public function BatchListAjaxEdite(Request $Request){

        if ($Request->ajax()) {
            
            $e = batchs::find($Request->UserId);
            $e->class_id = $Request->class_id;
            $e->batch_name = $Request->batch_name;
            $e->student_capaticy = $Request->student_capaticy;

            $e->save();
             return $this->BatchListAjax($Request);
        }
    }

   
}
