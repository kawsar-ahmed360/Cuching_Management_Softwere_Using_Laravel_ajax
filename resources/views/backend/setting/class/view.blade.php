@extends('backend.master')

@section('content')
 

<div class="col-12 p-10">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Class List <button onclick="add_class()" type="" class="btn btn-success btn-sm">Add Class</button></h4>
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

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    	  <tr>
                        <th>Sl.</th>
                        <th>Class Name</th>
                        <th>Status</th>
                    
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody id="showschool">

                        @include('backend/setting/class/view_ajax')
                    </tbody>
                </table>
            </div>
        </div>

@include('backend/setting/class/modal/add_class')
@include('backend/setting/class/modal/edite')
@endsection
@section('footer')

<script type="text/javascript">
	function add_class(){
		$('#Modal').modal('show');
	}



	$('#ClassAdd').submit(function(e){
		e.preventDefault();

		var url = $(this).attr('action');
		var method = $(this).attr('method');
		var data = $(this).serialize();

		$('#Modal').modal('hide');
		$.ajax({
            url:url,
            method:method,
            data:data,

            success:function(){

            	$.get("{{ route('classListAjax') }}",function(data){
                     $('#showschool').empty().html(data);
            	});
            }
		});
	});



	function active(ClasId){

		var alrm = "if you want to active this Item,press ok";

		if (confirm(alrm)) {
			$.ajax({
				url:"{{ route('classListAjaxaActive') }}",
				type:"GET",
				data:{ClasId:ClasId},

				success:function(){

					$.get("{{ route('classListAjax') }}",function(data){
                     $('#showschool').empty().html(data);
            	});
				}
			});
		}
	}	

	function deactive(ClasId){

		var alrm = "if you want to deactive this Item,press ok";

		if (confirm(alrm)) {
			$.ajax({
				url:"{{ route('classListAjaxaDeactive') }}",
				type:"GET",
				data:{ClasId:ClasId},

				success:function(){

					$.get("{{ route('classListAjax') }}",function(data){
                     $('#showschool').empty().html(data);
            	});
				}
			});
		}
	}

		function del(ClasId){

		var alrm = "if you want to delete this Item,press ok";

		if (confirm(alrm)) {
			$.ajax({
				url:"{{ route('classListAjaxaDelete') }}",
				type:"GET",
				data:{ClasId:ClasId},

				success:function(){

					$.get("{{ route('classListAjax') }}",function(data){
                     $('#showschool').empty().html(data);
            	});
				}
			});
		}
	}

	function editeclas(ClasId,Name){

		$('#editeclassModal').modal('show');
		$('#editeclassModal').find('#class_name').val(Name);
		$('#editeclassModal').find('#UserId').val(ClasId);

	}

	$('#ClassEdite').submit(function(e){

		e.preventDefault();

		var url = $(this).attr('action');
		var method = $(this).attr('method');
		var data = $(this).serialize();
		
		$('#editeclassModal').modal('hide');


		$.ajax({
			url:url,
			type:method,
			data:data,

			success:function(){

					$.get("{{ route('classListAjax') }}",function(data){
                     $('#showschool').empty().html(data);
            	});
			}
		});


	});
</script>

@endsection