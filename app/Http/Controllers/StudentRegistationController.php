<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\classes;
use App\schools;
use App\courchs;
use App\batchs;
use App\students;
use App\student_details;
use DB;
use Auth;
use Image;
use Illuminate\Support\Facades\Hash;
class StudentRegistationController extends Controller
{
    public function StudentPage(){
       $data['school'] = schools::where('status','2')->get();
       $data['class'] = classes::where('status','2')->get();
    	return view('backend/student/student_registation',$data);

    }

    public function CourchselectAjax(Request $Request){

    	if ($Request->ajax()) {
    		$data['class'] = classes::where('status','2')->get();
    		$data['courch'] = courchs::where('class_id',$Request->class_id)->get();



    		return view('backend/student/student_type',[
                'data'=>$Request
    		],$data);

    	}
    }

    public function BatchelectAjax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$data['batch'] = batchs::where('class_id',$Request->class_id)->where('courch_id',$Request->CourId)->get();
              
              $data['type'] = courchs::find($Request->CourId);
    		return view('backend/student/batch_role_form',$data);
    	}
    }

    public function StudentPage_Save(Request $Request){

        $Request->validate([
        'student_name'=>'required',
        'school_id'=>'required',
        'class_id'=>'required',
        'father_name'=>'required',
        'father_mobile'=>'required',
        'father_profession'=>'required',
        'mother_name'=>'required',
        'mother_mobile'=>'required',
        'mother_profession'=>'required',
        'sms_mobile'=>'required',
        'date_of_admission'=>'required',
     
        'address'=>'required',
        
        ]);

        $stu = new students();

        $stu->student_name =$Request->student_name;
        $stu->school_id =$Request->school_id;
        $stu->class_id =$Request->class_id;
        $stu->father_name =$Request->father_name;
        $stu->father_mobile =$Request->father_mobile;
        $stu->father_profession =$Request->father_profession;
        $stu->mother_name =$Request->mother_name;
        $stu->mother_mobile =$Request->mother_mobile;
        $stu->mother_profession =$Request->mother_profession;
        $stu->email_address =$Request->email_address;
        $stu->sms_mobile =$Request->sms_mobile;
        $stu->date_of_admission =$Request->date_of_admission;
        // $stu->student_photo =$Request->student_photo;
        $stu->address =$Request->address;
        $stu->status =$Request->status;
        $stu->password ='kawsar';
        $stu->encrypt_password = Hash::make('kawsar'); 
        $stu->auther =Auth::user()->id;
        
        DB::transaction(function()use($Request,$stu){
              
              if ($stu->save()) {
                  
                  foreach ($Request->courch_id as $key=>$courchId) {
                      
                      $sty_type =new student_details();
                      $sty_type->student_id = $stu->id;
                      $sty_type->class_id = $Request->class_id;
                      $sty_type->courch_id = $courchId;
                      $sty_type->batch_id = $Request->batch_id[$key];
                      $sty_type->roll_number = $Request->roll_number[$key];
                      $sty_type->type_status = 1;

                      $sty_type->save();
                  }                          

         }
              
        });

         if ($stu->save()) {
                         
                         echo "success";
                         $notification = array(
                       'message'=>'student successfully registared',
                       'alert-type'=>'success',
                         );
                     }

       return redirect()->back()->with($notification); 

    }

    public function running_student(){
      $data['all_student'] = DB::table('students')
                    ->join('classes','students.class_id','classes.id')
                    ->join('schools','students.school_id','schools.id')
                    ->select('students.*','classes.class_name','schools.school_name')
                    ->where(['students.status'=>'1'])
                    ->get();

       return view('backend/student/all_active_student',$data);
    }

    public function classWiseStudent(){

      $data['class'] = classes::where('status','2')->get();

      return view('backend/student/class_wise_student',$data);
    }

    public function batchSelect(Request $Request){

      if ($Request->ajax()) {
        
        $batch = courchs::where('status','2')->where('class_id',$Request->class_id)->get();

        return response()->json($batch);
      }
    }

    public function fullViewAjax(Request $Request){

      if ($Request->ajax()) {
        
         $data['student'] = DB::table('students')
                          ->join('classes','students.class_id','classes.id')
                          ->join('student_details','student_details.student_id','students.id')
                          ->join('schools','students.school_id','schools.id')
                          ->select('students.*','classes.class_name','schools.school_name','student_details.roll_number')
                          ->where([
                           'students.status'=>1,
                           'students.class_id'=>$Request->class_id,
                           'student_details.courch_id'=>$Request->couch,
                           'student_details.type_status'=>1,
                          ])->get();

                  return view('backend/student/class_wise_stu_list',$data);      

      }
    }

    public function studentProfile($id){

      $data['school'] = schools::where('status','2')->get();
      // $data['class'] = classes::where('status','2')->get();

      $data['student'] = DB::table('students')
                         ->join('classes','students.class_id','classes.id')
                         ->join('schools','students.school_id','schools.id')
                         ->join('student_details','student_details.student_id','students.id')
                         ->join('courchs','student_details.courch_id','courchs.id')
                         ->join('batchs','student_details.batch_id','batchs.id')
                         ->select('students.*','classes.class_name','schools.school_name','courchs.courch_type','student_details.roll_number','batchs.batch_name')
                        ->where('students.status','1')->where('students.id',$id)->get();

      return view('backend/student/student_profile/profile',$data);
    }

    public function studentInfoEdite(Request $Request){


        $edite = students::find($Request->studentId);

        $edite->student_name = $Request->student_name;
        $edite->school_id = $Request->school_id;
        $edite->father_name = $Request->father_name;
        $edite->father_mobile = $Request->father_mobile;
        $edite->father_profession = $Request->father_profession;
        $edite->mother_name = $Request->mother_name;
        $edite->mother_mobile = $Request->mother_mobile;
        $edite->mother_profession = $Request->mother_profession;
        $edite->email_address = $Request->email_address;
        $edite->sms_mobile = $Request->sms_mobile;
        $edite->address = $Request->address;

        if ($Request->hasFile('student_photo')) {
          
          $image = $Request->file('student_photo');
          $full_name = time().'.'.$image->getClientOriginalExtension();

          @unlink(public_path('backend/student_profile/'.$edite->student_photo));

          Image::make($image)->resize(300,320)->save('public/backend/student_profile/'.$full_name);

          $edite->student_photo = $full_name;
        }

        $edite->save();

        if ($edite->save()) {
          echo "success";
          $notification = array(
          'message'=>'successfully student info update',
          'alert-type'=>'success',
          );
        }


       return redirect()->back()->with($notification); 
    }
    public function BatchWiseStudent(){
          $data['class'] = classes::where('status','2')->get();
         return view('backend/student/batch_wise_student/batch_wise',$data);

    }

    public function CourJax(Request $Request){
      if ($Request->ajax()) {
        
        $courch = courchs::where('class_id',$Request->class_id)->where('status','2')->get();

        return response()->json($courch); 
      }
    }

    public function BatJax(Request $Request){

      if ($Request->ajax()) {
        
         $batch = batchs::where('class_id',$Request->class_id)->where('courch_id',$Request->courch_id)->where('status','2')->get();

         return response()->json($batch);
      }
    }

    public function classCourchBatchview(Request $Request){

           if ($Request->ajax()) {
              
            $data['student'] = DB::table('students')
                              ->join('classes','students.class_id','classes.id')
                              ->join('schools','students.school_id','schools.id')
                              ->join('student_details','student_details.student_id','students.id')
                              ->select('students.*','classes.class_name','schools.school_name','student_details.roll_number')
                               ->where([
                                  'students.status'=>1,
                                  'students.class_id'=>$Request->class_id,
                                  'student_details.courch_id'=>$Request->courch_id,
                                  'student_details.batch_id'=>$Request->batch_id,
                               ])->get(); 
      
             return view('backend/student/batch_wise_student/batch_wise_table',$data);

           }
    }
}