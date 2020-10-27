       <div class="form-group col-md-6 mb-3">
                        <label for="classId" class="col-sm-4 col-form-label text-right">Class Name</label>
                        <select name="class_id" class="form-control col-sm-8" id="classId" required>
                            <option value="">Select Class</option>
                             @foreach($class as $c)
                              <option value="{{ $c->id }}" {{ $c->id == $data->class_id?'selected':"" }}>{{ $c->class_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>

                      <div class="form-group col-md-6 mb-3">
                        <label class="col-sm-4 col-form-label text-right">Student Type</label>
                         <div class="col-sm-8" id="typeid">
                         	<span class="text-info">
                         		
 	@if(count($courch)>0)
							@foreach($courch as $c)
							<input type="checkbox" onclick="Batchse('{{ $c->id }}')" id="courchId-{{ $c->id }}" name="courch_id[{{ $c->id }}]" value="{{ $c->id }}" class="mr-2 ml-2"/> {{ $c->courch_type }}
							@endforeach
							@else
							<span class="text-danger">First Coursh Type Add</span>
							@endif
                         	</span>
                         </div>

                    </div>




 @foreach($courch as $c)
<div class="col-12" id="info-{{ $c->id }}">
	
</div>
  @endforeach
  
  <script type="text/javascript">

  @foreach($courch as $c)
       
       $('#courchId-{{ $c->id }}').change(function(){
       	var CourId = $(this).val();

       	if ($(this).prop('checked')) {
              
              var class_id = $('#classId').val();

      if (class_id && CourId) {

      	$.get("{{ route('BatchelectAjax') }}",{class_id:class_id,CourId:CourId},function(data){
             
             $('#info-'+CourId).empty().html(data);

      	});
      }
             
       	}else{
          
          $('#info-'+CourId).empty();

       	}
       });
   
  @endforeach



  		$('#classId').on('change',function(){
		var class_id = $(this).val();

		$.ajax({
			url:"{{ route('CourchselectAjax') }}",
			type:"GET",
			data:{class_id:class_id},

			success:function(data){

			
				$('#BatchInfo').empty().html(data);
			}
		});
	});
  </script>                  