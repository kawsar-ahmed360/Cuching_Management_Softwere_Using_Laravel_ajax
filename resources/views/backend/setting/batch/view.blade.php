@extends('backend.master')

@section('content')
 

<div class="col-12 p-10">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Batch List <button onclick="batch_Add()" type="" class="btn btn-success btn-sm">Add Batch</button></h4>
                </div>
            </div>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('success'))

 <div class="alert alert-success">
 	{{ Session::get('success') }}
 </div>

@endif


            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    	  <tr>
                        <th>Sl.</th>
                        <th>class Name</th>
                        <th>courch Name</th>
                        <th>Batch Name</th>
                        <th>Capacity</th>
                      
                        <th>Status</th>
                    
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody id="batchshow">

                        @include('backend/setting/batch/view_ajax')
                    </tbody>
                </table>
            </div>
        </div>

@include('backend/setting/batch/modal/add_batch')
@include('backend/setting/batch/modal/edite')
@endsection
@section('footer')

<script type="text/javascript">

 $('#class_id').on('change',function(){
 	var class_id = $(this).val()
      
      $.ajax({
      	url:"{{ route('CourchListAjaxCourch') }}",
      	type:"GET",
      	data:{class_id:class_id},
        
        success:function(data){
         
          var html = '<option value="">---Select Courch--</option>';

          $.each(data,function(key,v){
          	html+='<option value="'+v.id+'">'+v.courch_type+'</option>';
          });

          $('#courch_id').empty().html(html);

        }

      });

 });

	

 function batch_Add(){


 	$('#BatchModal').modal('show');
 }

 $('#BatchAdd').submit(function(e){
 	e.preventDefault();

 	var url = $(this).attr('action');
 	var method = $(this).attr('method');
 	var data = $(this).serialize();

 	$('#BatchModal').modal('hide');

 	$.ajax({
 		url:url,
 		type:method,
 		data:data,

 		success:function(data){

 			$('#batchshow').empty().html(data);
 		}
 	});

 });

 function editebat(BatchId,ClassId,BatchName,Capacity){
        
        $('#BatchModalEdite').modal('show');
        $('#BatchModalEdite').find('#class_id').val(ClassId);
        $('#BatchModalEdite').find('#batch_name').val(BatchName);
        $('#BatchModalEdite').find('#student_capaticy').val(Capacity);
        $('#BatchModalEdite').find('#UserId').val(BatchId);
 }

 $('#BatchEdite').submit(function(e){
 	e.preventDefault();

    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var data = $(this).serialize();

        $('#BatchModalEdite').modal('hide');

        $.ajax({
        	url:url,
        	type:method,
        	data:data,

        	success:function(data){
            
            $('#batchshow').empty().html(data);

        	}
        });

 });


 function Active(BatchId){

 	var alrm = 'if you want to active this itme,press ok';

 	if (confirm(alrm)) {

 		$.get("{{ route('BatchListAjaxActive') }}",{BatchId:BatchId},function(data){
 			$('#batchshow').empty().html(data);
 		});
 	}
 }


  function Deactive(BatchId){

 	var alrm = 'if you want to Deactive this itme,press ok';

 	if (confirm(alrm)) {

 		$.get("{{ route('BatchListAjaxDeactive') }}",{BatchId:BatchId},function(data){
 			$('#batchshow').empty().html(data);
 		});
 	}
 } 

  function del(BatchId){

 	var alrm = 'if you want to Delete this itme,press ok';

 	if (confirm(alrm)) {

 		$.get("{{ route('BatchListAjaxDelete') }}",{BatchId:BatchId},function(data){
 			$('#batchshow').empty().html(data);
 		});
 	}
 }

</script>

@endsection