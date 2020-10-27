<div id="BatchModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content"  style="background: silver; color:white">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Batch</h4>
      </div>
      <div class="modal-body">
         
           <div class="card">
              <div class="card-body">
                          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                      <form action="{{ route('BatchSave') }}" method="post" id="BatchAdd" enctype="multipart/form-data">
                        @csrf
                            

                             <div class="form-group">
                                  
                                  <label style="color: black">Class Name</label>
                                  
                                  <select id="class_id" class="form-control" name="class_id">
                                    <option disabled="" selected="">--select Class--</option>
                                    @foreach($class as $c)
                                        <option value="{{ $c->id }}">{{ $c->class_name }}</option>
                                      
                                    @endforeach
                                  </select>

                         </div> 


                             <div class="form-group">
                                  
                                  <label style="color: black">Courch Name</label>
                                  
                                  <select id="courch_id" class="form-control" name="courch_id">
                                    <option disabled="" selected="">--select Class--</option>
                                    
                                  </select>

                         </div> 

                  
    
                         <div class="form-group">
                                  
                                  <label style="color: black">Batch Name</label>
                                  <input type="text" class="form-control" name="batch_name" id="batch_name" placeholder="Enter your batch_name...">

                         </div> 

                          <div class="form-group">
                                  
                                  <label style="color: black">Student Capacity</label>
                                  <input type="text" class="form-control" name="student_capaticy" id="student_capaticy" placeholder="Enter your student_capaticy...">

                         </div>

                       

                         <input type="hidden" name="UserId" value="" id="UserId">
                        <div class="modal-footer">
                          <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                          <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                          <button type="submit" class="btn btn-success btn-sm" >Submit</button>
                        </div>
                      </form>

              </div>
           </div>

      </div>
    </div>

  </div>
</div>