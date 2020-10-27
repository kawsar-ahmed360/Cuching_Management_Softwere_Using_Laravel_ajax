<div id="passModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content"  style="background: silver; color:white">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Password Change</h4>
      </div>
      <div class="modal-body">
         
           <div class="card">
              <div class="card-body">
                      <form action="{{ route('passwordChange') }}" method="post" id="passwordchange">
                        @csrf
    
                         <div class="form-group">
                                  
                                  <label style="color: black">Current Password</label>
                                  <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Enter your current_password...">
                         </div>

                           <div class="form-group">
                                  
                                  <label style="color: black">New Password</label>
                                  <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter your new_password...">
                         </div>

                           <div class="form-group">
                                  
                                  <label style="color: black">Re-type</label>
                                  <input type="password" class="form-control" name="again_password" id="again_password" placeholder="Enter your again_password...">
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