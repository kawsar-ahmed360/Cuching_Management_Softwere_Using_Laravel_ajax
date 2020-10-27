<div id="imageModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content"  style="background: silver; color:white">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Profile Change</h4>
      </div>
      <div class="modal-body">
         
           <div class="card">
              <div class="card-body">
                      <form action="{{ route('profileChange') }}" method="post" id="imagechange" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                                  
                                  <label style="color: black">Old Image</label>
                                   <img class="" src="{{ $user->avater?url('public/backend/profile/',$user->avater):url('public/backend/avater.png') }}" width="100px" style="border-radius: 9px" alt="">
                         </div>
    
                         <div class="form-group">
                                  
                                  <label style="color: black">Upload Image</label>
                                  <input type="file" class="form-control" name="avater" id="imgInp" placeholder="Enter your current_password...">
                         </div>

                         <div class="form-group">
                                  
                                  <label style="color: black">New Image</label>
                                  <img id="blah" src="#" alt="your image" width="100px" style="border-radius: 9px" />
                         </div>


                         <input type="hidden" name="UserId" value="{{ $user->id }}" id="UserId">
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