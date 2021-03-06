@extends('backend.master')

@section('content')
 

<div class="col-12 p-10">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Batch Wise Student List</h4>
                </div>

                <div class="row">
                       
                       <div class="col">
                           <label>CLass Name</label>
                           <select class="form-control" name="class_id" id="class_id">
                               <option disabled="" selected="">----Select Class--</option>
                               @foreach($class as $c)
                                <option value="{{ $c->id }}">{{ $c->class_name }}</option>
                               @endforeach
                           </select>
                       </div>

                       <div class="col">
                           <label>Courch Name</label>
                           <select class="form-control" name="courch_id" id="courch_id">
                               <option disabled="" selected="">----Select Coruch--</option>
                           </select>
                       </div>

                       <div class="col">
                           <label>Batch Name</label>
                           <select class="form-control" name="batch_id" id="batch_id">
                               <option disabled="" selected="">----Select Batch--</option>
                           </select>
                       </div>
                </div>
            </div>

             <div class="row">
                  <div class="col" id="tableshow">
                      
                  </div>
             </div>
        </div>
@endsection

@section('footer')

 <script type="text/javascript">
   
    $('#class_id').on('change',function(){

       var class_id = $(this).val();

       $.ajax({
         url:"{{ route('CourJax') }}",
         type:"GET",
         data:{class_id:class_id},

         success:function(data){

          var html = '<option value="">----Select Courch--</option>';

          $.each(data,function(key,v){
            html+='<option value="'+v.id+'">'+v.courch_type+'</option>';
          });
          $('#courch_id').empty().html(html);
         }
       });

    });

    $('#courch_id').on('change',function(){
      var courch_id = $(this).val();
      var class_id = $('#class_id').val();

        $.ajax({
          url:"{{ route('BatJax') }}",
          type:"GET",
          data:{courch_id:courch_id,class_id:class_id},

          success:function(data){
            var html = '<option value="">---Select Batch---</option>';

            $.each(data,function(key,v){
               html+='<option value="'+v.id+'">'+v.batch_name+'</option>';
            });
            $('#batch_id').empty().html(html);
          }
        });
    });


    $('#batch_id').on('change',function(){
       var batch_id = $(this).val();
       var class_id = $('#class_id').val();
       var courch_id = $('#courch_id').val();
        
        $.ajax({
          url:"{{ route('classCourchBatchview') }}",
          type:"GET",
          data:{class_id:class_id,batch_id:batch_id,courch_id:courch_id},

          success:function(data){
             
             $('#tableshow').empty().html(data);
          }
        });

    });

 </script>


@endsection