<div id="Modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content"  style="background: silver; color:white">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Class</h4>
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
                      <form action="{{ route('classListSave') }}" method="post" id="ClassAdd" enctype="multipart/form-data">
                        @csrf


    
                         <div class="form-group">
                                  
                                  <label style="color: black">Class Name</label>
                                  <input type="text" class="form-control @error('class_name') is-invalid @enderror" name="class_name" id="class_name" placeholder="Enter your class_name...">

                                   @error('class_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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