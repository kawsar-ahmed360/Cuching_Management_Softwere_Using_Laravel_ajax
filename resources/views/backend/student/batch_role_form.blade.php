<div class="row">
  
    <div class="form-group col-md-6 mb-3">
                        <label for="classId" class="col-sm-4 col-form-label text-right">{{ $type->courch_type }} Batch</label>
                        <select name="batch_id[{{ $type->id }}]" class="form-control col-sm-8" id="batch_id" required>
                            <option value="">Select Batch</option>
                             @foreach($batch as $b)
                              <option value="{{ $b->id }}">{{ $b->batch_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>


          
           <div class="form-group col-md-6 mb-3">
                        <label for="dateOfAdmission" class="col-sm-4 col-form-label text-right">Roll Number</label>
                        <input type="text" name="roll_number[{{ $type->id }}]" class="form-control col-sm-8" id="roll_number" required placeholder="Enter your Roll Number">
                        <div class="col-md-8 text-right">
                            <span class="text-danger"></span>
                        </div>
                    </div>


</div>