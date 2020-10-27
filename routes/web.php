<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('backend/main');
});

Auth::routes();

route::get('user_registatio','UserRegistasreController@UserShow')->name('UserShow')->middleware('auth');
route::post('user_registatiosave','UserRegistasreController@UserSave')->name('UserSave')->middleware('auth');
route::get('user_registatioview','UserRegistasreController@UserViewlist')->name('UserViewlist')->middleware('auth');
route::get('user_profile','UserRegistasreController@UserProfile')->name('UserProfile')->middleware('auth');
route::get('user_profileajax','UserRegistasreController@UserProfileajax')->name('UserProfileajax')->middleware('auth');
route::post('user_profileajaxsave','UserRegistasreController@UserProfileajaxsave')->name('UserProfileajaxsave')->middleware('auth');
route::post('password_change','UserRegistasreController@passwordChange')->name('passwordChange')->middleware('auth');
route::post('profile_change','UserRegistasreController@profileChange')->name('profileChange')->middleware('auth');


route::group(['middleware'=>'auth'],function(){

    //..............................School Management.......................
    route::get('school_list','SchollManageController@schoolView')->name('schoolView');
    route::get('school_listajax','SchollManageController@schoolViewajax')->name('schoolViewajax');
    route::post('school_save','SchollManageController@schoolSave')->name('schoolSave');
    route::get('school_active','SchollManageController@schoolactive')->name('schoolactive');
    route::get('school_Deactive','SchollManageController@schoolDeactive')->name('schoolDeactive');
    route::post('school_Edite','SchollManageController@schoolEdite')->name('schoolEdite');
    route::get('school_Delete','SchollManageController@schoolDelete')->name('schoolDelete');

    //...............................Class Management........................

    route::get('class_list','ClassController@classList')->name('classList');
    route::get('class_listAjax','ClassController@classListAjax')->name('classListAjax');
    route::post('class_listSave','ClassController@classListSave')->name('classListSave');
    route::get('class_listAjaxaActive','ClassController@classListAjaxaActive')->name('classListAjaxaActive');
    route::get('class_listAjaxaDeactive','ClassController@classListAjaxaDeactive')->name('classListAjaxaDeactive');
    route::get('class_listAjaxaDelete','ClassController@classListAjaxaDelete')->name('classListAjaxaDelete');
    route::post('class_listAjaxaEdite','ClassController@classListAjaxaEdite')->name('classListAjaxaEdite');

    //..............................Batch_ManageController.........................

     route::get('Batch_list','BatchManageController@BatchList')->name('BatchList');
     route::get('Batch_listAjax','BatchManageController@BatchListAjax')->name('BatchListAjax');
     route::post('Batch_Save','BatchManageController@BatchSave')->name('BatchSave');
     route::get('Batch_listAjaxActive','BatchManageController@BatchListAjaxActive')->name('BatchListAjaxActive');
     route::get('Batch_listAjaxDeactive','BatchManageController@BatchListAjaxDeactive')->name('BatchListAjaxDeactive');
     route::get('Batch_listAjaxDelete','BatchManageController@BatchListAjaxDelete')->name('BatchListAjaxDelete');
     route::post('Batch_listAjaxEdite','BatchManageController@BatchListAjaxEdite')->name('BatchListAjaxEdite');
 
     route::get('Courch_listAjaxCourch','BatchManageController@CourchListAjaxCourch')->name('CourchListAjaxCourch');


     //.................................Courch Type.............................
     route::get('Courch_list','CourchController@CourchList')->name('CourchList');
     route::get('Courch_listAjax','CourchController@CourchListAjax')->name('CourchListAjax');
     route::post('Courch_Save','CourchController@CourchSave')->name('CourchSave');
     route::get('Courch_listAjaxActive','CourchController@CourchListAjaxActive')->name('CourchListAjaxActive');
     route::get('Courch_listAjaxDeactive','CourchController@CourchListAjaxDeactive')->name('CourchListAjaxDeactive');
     route::get('Courch_listAjaxDelete','CourchController@CourchListAjaxDelete')->name('CourchListAjaxDelete');
     route::post('Courch_listAjaxEdite','CourchController@CourchListAjaxEdite')->name('CourchListAjaxEdite');


     //.............................StudentRegistaion ......................

     route::get('student','StudentRegistationController@StudentPage')->name('StudentPage');
     route::post('student_Save','StudentRegistationController@StudentPage_Save')->name('StudentPage_Save');
     route::get('Courch_selectajax','StudentRegistationController@CourchselectAjax')->name('CourchselectAjax');
     route::get('BatchSelectajax','StudentRegistationController@BatchelectAjax')->name('BatchelectAjax');
     route::get('all_Running_Student','StudentRegistationController@running_student')->name('running_student');
     route::get('class_wise_student','StudentRegistationController@classWiseStudent')->name('classWiseStudent');
     route::get('batch_ajax','StudentRegistationController@batchSelect')->name('batchSelect');
     route::get('full_view_ajax','StudentRegistationController@fullViewAjax')->name('fullViewAjax');


     route::get('student_profile/{id}','StudentRegistationController@studentProfile')->name('studentProfile');
     route::post('student_InfoEdite','StudentRegistationController@studentInfoEdite')->name('studentInfoEdite');
     route::get('batch_wise_Student','StudentRegistationController@BatchWiseStudent')->name('BatchWiseStudent');
     route::get('Cour_ajax','StudentRegistationController@CourJax')->name('CourJax');
     route::get('bat_ajax','StudentRegistationController@BatJax')->name('BatJax');
     route::get('class_coruch_batch','StudentRegistationController@classCourchBatchview')->name('classCourchBatchview');


  //............................Year Management..........................
   route::get('year_set','DateYearManagement@YeaSet')->name('YearSet');

   //.............................Student Attendance.....................
     route::get('student_attendance','AttendanceController@StudentAttendance')->name('StudentAttendance');
     route::post('student_attendanceSave','AttendanceController@StudentAttendanceSave')->name('StudentAttendanceSave');
     route::get('student_atten_show','AttendanceController@allstudentShowattend')->name('allstudentShowattend');
     route::get('attendace_view','AttendanceController@View_Attendance')->name('View_Attendance');
     route::get('attendace_view_Date','AttendanceController@View_Attendance_Date')->name('View_Attendance_Date');
     route::get('attendacne_edite','AttendanceController@AttendanceEdite')->name('AttendanceEdite');
     route::get('attendacne_edite_table','AttendanceController@AttendanceEditetable')->name('AttendanceEditetable');
     route::post('attendacne_update','AttendanceController@AttendanceEupdate')->name('AttendanceEupdate');



     

});

Route::get('/home', 'HomeController@index')->name('home');
