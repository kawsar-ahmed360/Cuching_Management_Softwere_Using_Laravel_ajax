<div id="ModalEdite" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content"  style="background: silver; color:white">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edite School</h4>
      </div>
      <div class="modal-body">
         
           <div class="card">
              <div class="card-body">
                      <form action="{{ route('schoolEdite') }}" method="post" id="schooledite" enctype="multipart/form-data">
                        @csrf


    
                         <div class="form-group">
                                  
                                  <label style="color: black">School Name</label>
                                  <input type="text" class="form-control" name="school_name" id="school_name" placeholder="Enter your school_name...">
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