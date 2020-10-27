@extends('backend.master')

@section('content')
 

<div class="col-12 p-10">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Courch List <button onclick="courch_Add()" type="" class="btn btn-success btn-sm">Add Batch</button></h4>
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
                        <th>Class Name</th>
                        <th>Coruch Name</th>
                      
                        <th>Status</th>
                    
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody id="courchShow">

                        @include('backend/setting/courch/view_ajax')
                    </tbody>
                </table>
            </div>
        </div>

@include('backend/setting/courch/modal/add_courch')
@include('backend/setting/courch/modal/edite')
@endsection
@section('footer')

<script type="text/javascript">
	function courch_Add(){

		$('#AddModal').modal('show');
	}

	$('#CourchAdd').submit(function(e){

		e.preventDefault(); 

		var url = $(this).attr('action');
		var method = $(this).attr('method');
		var data = $(this).serialize();
		$('#AddModal #reset').click();
		$('#AddModal').modal('hide');

		$.ajax({
			url:url,
			type:method,
			data:data,

			success:function(data){

				$('#courchShow').empty().html(data);
			}
		});
	});

	function Active(CourcId){

		var alrm = "If you Want to Active This Item,press ok";

		if (confirm(alrm)) {

			$.get("{{ route('CourchListAjaxActive') }}",{CourcId:CourcId},function(data){
				$('#courchShow').empty().html(data);
			});
		}
	}

	function Deactive(CourcId){

		var alrm = "If you Want to Deactive This Item,press ok";

		if (confirm(alrm)) {

			$.get("{{ route('CourchListAjaxDeactive') }}",{CourcId:CourcId},function(data){
				$('#courchShow').empty().html(data);
			});
		}
	}

		function Del(CourcId){

		var alrm = "If you Want to Delete This Item,press ok";

		if (confirm(alrm)) {

			$.get("{{ route('CourchListAjaxDelete') }}",{CourcId:CourcId},function(data){
				$('#courchShow').empty().html(data);
			});
		}
	}

	function Edite(CourcId,ClasId,Courch){

		$('#EditeModal').modal('show');
		$('#EditeModal').find('#class_id').val(ClasId);
		$('#EditeModal').find('#courch_type').val(Courch);
		$('#EditeModal').find('#UserId').val(CourcId);
	}

	$('#CourchEdite').submit(function(e){
		e.preventDefault();

		var url = $(this).attr('action');
		var method = $(this).attr('method');
		var data = $(this).serialize();
        $('#EditeModal #reset').click();
		$('#EditeModal').modal('hide');
		$.ajax({
			url:url,
			type:method,
			data:data,

			success:function(data){
				$('#courchShow').empty().html(data);
			}
		});
	});
</script>

@endsection