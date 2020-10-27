<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content"  style="background: silver; color:white">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edite Profile Info</h4>
      </div>
      <div class="modal-body">
         
           <div class="card">
              <div class="card-body">
                      <form action="{{ route('UserProfileajaxsave') }}" method="post" id="EditeINFO">
                        @csrf
    
                         <div class="form-group">
                                  
                                  <label style="color: black">User Name</label>
                                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name...">
                         </div>

                           <div class="form-group">
                                  
                                  <label style="color: black">Email</label>
                                  <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email...">
                         </div>

                           <div class="form-group">
                                  
                                  <label style="color: black">Mobile</label>
                                  <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter your mobile...">
                         </div>
                         <input type="hidden" name="UserId" id="UserId">
                        <div class="modal-footer">
                          <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success btn-sm" >Submit</button>
                        </div>
                      </form>

              </div>
           </div>

      </div>
    </div>

  </div>
</div>