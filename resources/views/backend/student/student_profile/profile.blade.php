@extends('backend.master')

@section('content')
 

<div class="col-12 p-10">
            <div class="form-group">
                <div class="col-sm-12">
                    
                </div>
            </div>

            <div class="row">
                 <div class="col-md-3 text-center">
              <h4 class="text-center font-weight-bold font-italic mt-3" style="text-decoration: underline;padding-top: 10px;padding-bottom: 10px">{{ $student[0]->student_name }} Profile</h4>
                   <img src="{{ ($student[0]->student_photo)?url('public/backend/student_profile/'.$student[0]->student_photo):url('public/backend/envato.png') }}" width="300px" style="border-radius:5px" alt="">
                   <hr>
                   <table class="table table-bordered">
                     <tr>
                       <td>
                         <a href="" data-toggle="modal" data-target="#StudentModalEdite" class="btn btn-block my-btn-submit">Upload Image</a>
                       </td>
                     </tr>
                   </table>
                 </div>

                 <div class="col-md-9">
                   <div class="table-responsive">
                       <table class="table table-bordered strips">
                         <thead>
                           <tr>
                             <th>Student Name</th>
                             <td>{{ $student[0]->student_name }}</td>
                           </tr>
                           <tr> 

                            <th>Student ID</th>
                             <td>{{ $student[0]->id }}</td>
                           </tr>
                           <tr>
                             <th>Class Name</th>
                             <td>{{ $student[0]->class_name }}</td>
                           </tr>
                            <tr>
                             <th>School Name</th>
                             <td>{{ $student[0]->school_name }}</td>
                           </tr>

                            <tr>
                             <th>Father Name</th>
                             <td>{{ $student[0]->father_name }}</td>
                           </tr>

                            <tr>
                             <th>Father Profession</th>
                             <td>{{ $student[0]->father_profession }}</td>
                           </tr>

                            <tr>
                             <th>Father Mobile</th>
                             <td>{{ $student[0]->father_mobile }}</td>
                           </tr>

                            <tr>
                             <th>Mother Name</th>
                             <td>{{ $student[0]->mother_name }}</td>
                           </tr>

                           <tr>
                             <th>Mother Profession</th>
                             <td>{{ $student[0]->mother_profession }}</td>
                           </tr>

                           <tr>
                             <th>Mother Mobile</th>
                             <td>{{ $student[0]->mother_mobile }}</td>
                           </tr>
                           <tr>
                             <th>Email Address</th>
                             <td>{{ $student[0]->email_address }}</td>
                           </tr>

                           <tr>
                             <th>SMS Mobile</th>
                             <td>{{ $student[0]->mother_mobile }}</td>
                           </tr>

                            <tr>
                             <th>Address</th>
                             <td>{{ $student[0]->address }}</td>
                           </tr>

                           <tr>
                             <th>Password</th>
                             <td>{{ $student[0]->password }}</td>
                           </tr> 

                           <tr>
                             <th>Courch Name</th>
                             <td>
                               @foreach($student as $s)
                               {{ $s->courch_type }}, <font style="color:red;font-weight: bold">Roll Number : {{ $s->roll_number }},</font>
                               @endforeach
                             </td>
                           </tr>

                           <tr>
                             <th>Batch Name</th>
                             <td>
                               @foreach($student as $b)
                                {{ $b->batch_name }},
                               @endforeach
                             </td>
                           </tr>


                         </thead>
                       </table>
                   </div>
                 </div>
            </div>

            
        </div>

{{-- @include('backend/setting/school/modal/add_school') --}}
@include('backend/student/student_profile/modal/edite_student')
@endsection
@section('footer')

<script type="text/javascript">
  @if(Session::has('message'))
    
    var type = "{{ Session::get('alert-type','success') }}";

    switch(type){
      case "success":
      toastr.success("{{ Session::get('message') }}");
      break;
    }

  @endif
</script>


@endsection