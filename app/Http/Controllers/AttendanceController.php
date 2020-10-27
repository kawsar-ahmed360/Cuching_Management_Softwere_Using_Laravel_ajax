<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\classes;
use App\schools;
use App\courchs;
use App\batchs;
use App\years;
use App\students;
use App\student_details;
use App\attendances;
use DB;
use Auth;
use Image;
class AttendanceController extends Controller
{
    public function StudentAttendance(){
         
         $data['class'] = classes::where('status','2')->get();
         $data['year'] = years::where('status','1')->get();

    	return view('backend/student/attendance/add_attendance',$data);
    }

    public function allstudentShowattend(Request $Request){

    	if ($Request->ajax()) {

   

    		$data['student'] = DB::table('students')
    		                  ->join('schools','students.school_id','schools.id')
    		                  ->join('student_details','student_details.student_id','students.id')
    		                  ->select('students.*','schools.school_name','student_details.roll_number')
    		                  ->where([
                                 'students.status'=>1,
                                 'students.class_id'=>$Request->class_id,
                                 'student_details.batch_id'=>$Request->batch_id,
                                 'student_details.courch_id'=>$Request->courch_id,
    		                  ])->get();

    		             return view('backend/student/attendance/add_attendance_table',$data);  
    		   
    	
        }
    }

    public function StudentAttendanceSave(Request $Request){
        
        $data = date('Y-m-d');

        $attendacne = attendances::where([
           'class_id'=>$Request->class_id,
           'courch_id'=>$Request->courch_id,
           'batch_id'=>$Request->batch_id,
        ])->whereDate('created_at',$data)->get();

        if (count($attendacne)>0) {
        	echo "error";

        	 $notification = array(
               'message'=>'attendsance alrady added',
               'alert-type'=>'error',
        	 );

        	return redirect()->back()->with($notification); 
            
        }else{

            
            foreach ($Request->attendance as $studentID=>$atten) {
            	
            	 $att = new attendances();
            	 $att->academinc_session = $Request->academinc_session;
            	 $att->class_id = $Request->class_id;
            	 $att->courch_id = $Request->courch_id;
            	 $att->batch_id = $Request->batch_id;
            	 $att->student_id = $studentID;
            	 $att->attendance = $atten;
            	 $att->status = 1;
            	 $att->save();

            }

           if ($att->save()) {
        	echo "success";

        	 $notification = array(
               'message'=>'attendsance successfully added',
               'alert-type'=>'success',
        	 );

        	return redirect()->back()->with($notification); 
        }
    
    }

}

 public function View_Attendance(){
    
    $data['class'] = classes::where('status','2')->get();
 	return view('backend/student/attendance/view_attendance',$data);
 }

 

 public function View_Attendance_Date(Request $Request){



 	      if ($Request->ajax()) {

 	   
 	      		$data['att'] = DB::table('attendances')
    		                  ->join('students','attendances.student_id','students.id')
    		                  ->join('student_details','student_details.student_id','students.id')
    		                  ->join('schools','students.school_id','schools.id')
    		                  ->select('attendances.*','schools.school_name','student_details.roll_number','students.student_name','students.sms_mobile')
    		                  ->where([
                              
                                 'attendances.class_id'=>$Request->class_id,
                                 'attendances.batch_id'=>$Request->batch_id,
                                 'attendances.courch_id'=>$Request->courch_id,
                                 'student_details.courch_id'=>$Request->courch_id,
                                 
    		                  ])->whereDate('attendances.created_at',$Request->date)->get();


    		             return view('backend/student/attendance/view_attendance_table',$data);     

 	      }
 }

			 public function AttendanceEdite(){

			 	 $data['class'] = classes::where('status','2')->get();

			 	 return view('backend/student/attendance/attendance_edite',$data);
			 }

			 public function AttendanceEditetable(Request $Request){

			 	if ($Request->ajax()) {
			 		
                  $date = date('Y-m-d');
			 		$data['att'] = DB::table('attendances')
    		                  ->join('students','attendances.student_id','students.id')
    		                  ->join('student_details','student_details.student_id','students.id')
    		                  ->join('schools','students.school_id','schools.id')
    		                  ->select('attendances.*','schools.school_name','student_details.roll_number','students.student_name','students.sms_mobile')
    		                  ->where([
                              
                                 'attendances.class_id'=>$Request->class_id,
                                 'attendances.batch_id'=>$Request->batch_id,
                                 'attendances.courch_id'=>$Request->courch_id,
                                 'student_details.courch_id'=>$Request->courch_id,
                                 
    		                  ])->whereDate('attendances.created_at',$date)->get();

    		                   return view('backend/student/attendance/attendance_edite_table',$data);  

			 	}
			 }


		public function AttendanceEupdate(Request $Request){

			 
			  foreach ($Request->attendance as $id=>$value) {
			  	
			  	         $edite = attendances::find($id);
		            	 $edite->attendance = $value;
		            	 $edite->save();

		            	    if ($edite->save()) {
					        	echo "success";

					        	 $notification = array(
					               'message'=>'attendsance successfully Update',
					               'alert-type'=>'success',
					        	 );

					        	return redirect()->back()->with($notification); 
					        }
			  }
		}	 

}
