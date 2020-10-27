@extends('backend.master')

@section('content')
 

<div class="col-12 p-10">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Running Student List</h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive text-center" style="width: 100%;">
                    <thead>
                    	  <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th>Class Name</th>
                        <th>School Name</th>
                        <th>Father Name</th>
                        <th>Father Mobile</th>
                        <th>Mother Name</th>
                        <th>Mobile Number</th>
                        <th>SMS Number</th>
                        <th>Student Id</th>
                       
                    
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody id="showschool">
                         @php($sl=1)
                     @foreach($all_student as $s)
                           <tr>
                           	  <td>{{ $sl++ }}</td>
                           	  <td>{{ $s->student_name }}</td>
                           	  <td>{{ $s->class_name }}</td>
                           	  <td>{{ $s->school_name }}</td>
                           	  <td>{{ $s->father_name }}</td>
                           	  <td>{{ $s->father_mobile }}</td>
                           	  <td>{{ $s->mother_name }}</td>
                           	  <td>{{ $s->mother_mobile }}</td>
                           	  <td>{{ $s->sms_mobile }}</td>
                           	  <td>{{ $s->id }}</td>
                           	  <td>
                           	  	<a href="{{ route('studentProfile',$s->id) }}" class="btn btn-dark btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                           	  	<a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                           	  </td>
                           </tr>
                     @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
{{-- 
@include('backend/setting/school/modal/add_school')
@include('backend/setting/school/modal/edite') --}}
@endsection
@section('footer')


@endsection