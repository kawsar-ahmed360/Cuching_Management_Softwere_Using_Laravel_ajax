@extends('backend.master')

@section('content')

  <div class="container">
  	
 <div class="col-12">

	
            
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Profile</h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="" class="table offset-3 table-striped table-bordered nowrap text-center" style="width: 60%;">
                    <thead id="profile" class="nowrap">
                      @include('backend/users/profile_view_ajax')
                    </thead>
                    
                </table>
            </div>
        </div>
  </div>
@include('backend/users/modal/edite_info')
@include('backend/users/modal/pass')
@include('backend/users/modal/profile')

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

//.................Image previe.......
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});
//.....................

	
	function edite_info(UserId,Name,Email,Mobile){

		$('#myModal').modal('show');
		$('#myModal').find('#name').val(Name);
		$('#myModal').find('#email').val(Email);
		$('#myModal').find('#mobile').val(Mobile);
		$('#myModal').find('#UserId').val(UserId);
	}

	$('#EditeINFO').submit(function(e){
		e.preventDefault();

		var url = $(this).attr('action');
		var method = $(this).attr('method');
		var data = $(this).serialize();

		$('#myModal').modal('hide');

		 $.ajax({
		 		url:url,
			type:method,
			data:data,

			success:function(){

				$.get("{{ route('UserProfileajax') }}",function(data){

					$('#profile').empty().html(data);
				});


			}
		});
	});


	function edite_pass(UseId){

		$('#passModal').modal('show');
		$('#passModal').find('#UserId').val(UseId);
	}

	$('#passwordchange').submit(function(e){
		e.preventDefault();
		var url = $(this).attr('action');
		var method = $(this).attr('method');
		var data = $(this).serialize();

		$('#passModal').modal('hide');

		$.ajax({
			url:url,
			method:method,
			data:data,

			success:function(){

					$.get("{{ route('UserProfileajax') }}",function(data){

					$('#profile').empty().html(data);
				});
			}
		});

	});

	function image(UserId){

		$('#imageModal').modal('show');
		
	}


</script>


@endsection