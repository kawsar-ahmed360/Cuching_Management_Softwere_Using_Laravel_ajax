@extends('backend/master')

@section('content')

  <div class="container">
  	
 <div class="col-12 pl-0 pr-0">

            
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">User List</h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
         @php($sl=1)
        @foreach($user as $us)
                    <tr>
                        <td>{{$sl++}}</td>
                        <td>{{ $us->name }}</td>
                        <td>{{ $us->email }}</td>
                        <td>{{ $us->mobile }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-dark"><span class="fa fa-eye"></span></a>
                            <a href="#" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                            <a href="#" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>

           @endforeach         
                 


                    </tbody>
                </table>
            </div>
        </div>
  </div>

@endsection