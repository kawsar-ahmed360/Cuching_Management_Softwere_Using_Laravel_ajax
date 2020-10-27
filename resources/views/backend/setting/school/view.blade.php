@extends('backend.master')

@section('content')
 

<div class="col-12 p-10">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Student List <button onclick="add_school()" type="" class="btn btn-success btn-sm">Add School</button></h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    	  <tr>
                        <th>Sl.</th>
                        <th>School Name</th>
                        <th>Status</th>
                    
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody id="showschool">

                        @include('backend/setting/school/view_ajax')
                    </tbody>
                </table>
            </div>
        </div>

@include('backend/setting/school/modal/add_school')
@include('backend/setting/school/modal/edite')
@endsection
@section('footer')

<script type="text/javascript">
	function add_school(){

		$('#Modal').modal('show');
	}

	$('#schoolAdd').on('submit',function(e){
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

			 	$.get("{{ route('schoolViewajax') }}",function(data){

			 		$('#showschool').empty().html(data);
			 	});
			 }
		});

        

	});

	function active(UserId){

		var alrm = "if you want to active this item";

		if (confirm(alrm)) {

			$.ajax({
				url:"{{ route('schoolactive') }}",
				type:"GET",
				data:{UserId:UserId},
                  
                 success:function(){

                 	$.get("{{ route('schoolViewajax') }}",function(data){

			 		$('#showschool').empty().html(data);
			 	});
                 }
			});
		}
	}

	function deactive(UserId){

		var alrm = "if you want to deactive this itme";
		if (confirm(alrm)) {
			$.ajax({
				url:"{{ route('schoolDeactive') }}",
				type:"GET",
				data:{UserId:UserId},
				success:function(){
					$.get("{{ route('schoolViewajax') }}",function(data){
                        $('#showschool').empty().html(data);
					});
				}
			});
		}
	}

	function edite(UserId,Name){

		$('#ModalEdite').modal('show');
		$('#ModalEdite').find('#school_name').val(Name);
		$('#ModalEdite').find('#UserId').val(UserId);
	}

	$('#schooledite').on('submit',function(e){
		e.preventDefault();

		var url = $(this).attr('action');
		var method = $(this).attr('method');
		var data = $(this).serialize();

		$('#ModalEdite').modal('hide');

		$.ajax({
			url:url,
			type:method,
			data:data,

			success:function(){
				$.get("{{ route('schoolViewajax') }}",function(data){
                        $('#showschool').empty().html(data);
					});
			}
		});

	});

	function del(UserId){

		var alrm = 'if you want to delete this itme';

		if (confirm(alrm)) {

			$.ajax({
				url:"{{ route('schoolDelete') }}",
				type:"GET",
				data:{UserId:UserId},

				success:function(){
                 
                 $.get("{{ route('schoolViewajax') }}",function(data){
                        $('#showschool').empty().html(data);
					});

				}
			});
		}
	}
</script>

@endsection