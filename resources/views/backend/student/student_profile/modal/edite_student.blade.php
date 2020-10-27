<div id="StudentModalEdite" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content"  style="background: silver; color:white">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edite Student Basic Info</h4>
      </div>
      <div class="modal-body">
         
           <div class="card">
              <div class="card-body">
                          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                      <form action="{{ route('studentInfoEdite') }}" method="post" id="StudentEdite" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" value="{{ $student[0]->id }}" name="studentId">
                            
   
    
                         <div class="form-group">
                                  
                                  <label style="color: black">Student Name</label>
                                  <input type="text" class="form-control" name="student_name" value="{{ $student[0]->student_name }}" id="student_name" placeholder="Enter your student_name...">

                         </div> 

                          <div class="form-group">
                                  
                                  <label style="color:black">School Name</label>
                                  <select class="form-control" name="school_id" id="school_id">
                                    <option disabled="" selected="">----Select School--</option>
                                    @foreach($school as $s)
                                          <option value="{{ $s->id }}"{{ $student[0]->school_id == $s->id?"selected":"" }}>{{ $s->school_name }}</option>
                                    @endforeach
                                  </select>

                         </div>  


                       {{--   <div class="form-group">
                                  
                                  <label style="color:black">Class Name</label>
                                  <select class="form-control" name="class_id" id="class_id">
                                    <option disabled="" selected="">----Select Class--</option>
                                     @foreach($class as $c)
                                          <option value="{{ $c->id }}" {{ $student[0]->class_id == $c->id?"selected":"" }}>{{ $c->class_name }}</option>
                                    @endforeach
                                  </select>

                         </div> --}}


                         <div class="form-group">
                                  
                                  <label style="color: black">Father Name</label>
                                  <input type="text" class="form-control" name="father_name" value="{{ $student[0]->father_name }}" id="father_name" placeholder="Enter your father_name...">

                         </div>

                         <div class="form-group">
                                  
                                  <label style="color: black">Father Profession</label>
                                  <input type="text" class="form-control" name="father_profession" value="{{ $student[0]->father_profession }}" id="father_profession" placeholder="Enter your father_profession...">

                         </div>

                         <div class="form-group">
                                  
                                  <label style="color: black">Father Mobile</label>
                                  <input type="text" class="form-control" name="father_mobile" value="{{ $student[0]->father_mobile }}" id="father_mobile" placeholder="Enter your father_mobile...">

                         </div>

                         <div class="form-group">
                                  
                                  <label style="color: black">Mother Name</label>
                                  <input type="text" class="form-control" name="mother_name" value="{{ $student[0]->mother_name }}" id="mother_name" placeholder="Enter your mother_name...">

                         </div>

                         <div class="form-group">
                                  
                                  <label style="color: black">Mother Mobile</label>
                                  <input type="text" class="form-control" name="mother_mobile" value="{{ $student[0]->mother_mobile }}" id="mother_mobile" placeholder="Enter your mother_mobile...">

                         </div>

                         <div class="form-group">
                                  
                                  <label style="color: black">Mother Profession</label>
                                  <input type="text" class="form-control" name="mother_profession" value="{{ $student[0]->mother_profession }}" id="mother_profession" placeholder="Enter your mother_profession...">

                         </div>

                         <div class="form-group">
                                  
                                  <label style="color: black">Email Address</label>
                                  <input type="text" class="form-control" name="email_address" value="{{ $student[0]->email_address }}" id="email_address" placeholder="Enter your email_address...">

                         </div>

                         <div class="form-group">
                                  
                                  <label style="color: black">SMS Mobile</label>
                                  <input type="text" class="form-control" name="sms_mobile" value="{{ $student[0]->sms_mobile }}" id="sms_mobile" placeholder="Enter your sms_mobile...">

                         </div>

                         <div class="form-group">
                                  
                                  <label style="color: black">Address</label>
                                  <input type="text" class="form-control" name="address" value="{{ $student[0]->address }}" id="address" placeholder="Enter your address...">

                         </div>

                         <div class="form-group">
                                  
                                  <label style="color: black">Old Photo</label> <br>
                                  <img src="{{ $student[0]->student_photo?url('public/backend/student_profile/'.$student[0]->student_photo):url('public/backend/envato.png') }}" width="100ox" alt="">

                         </div>

                         <div class="form-group">
                                  
                                  <label style="color: black">Student Photo</label>
                                  <input type="file" class="form-control" name="student_photo" id="student_photo" placeholder="Enter your sms_mobile...">

                         </div>

                       

                         <input type="hidden" name="UserId" value="" id="UserId">
                        <div class="modal-footer">
                          <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                          <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                          <button type="submit" class="btn btn-success btn-sm" >Submit</button>
                        </div>
                      </form>

              </div>
           </div>

      </div>
    </div>

  </div>
</div>