
@if(count($student)>0)

<div class="table-responsive p-1">
                <table id="" class="table table-striped table-bordered dt-responsive text-center" style="width: 100%;">
                    <thead>
                          <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        {{-- <th>Class Name</th> --}}
                        <th>School Name</th>
                        {{-- <th>Mobile Number</th> --}}
                        <th>SMS Number</th>
                        <th>Student Id</th>
                       
                    
                        <th style="width: 220px;">Attendance</th>
                    </tr>
                    </thead>
                    <tbody id="">
                      @php($sl=1)
                      @foreach($student as $s)
                       <tr>
                          <td>{{ $sl++ }}</td>
                          <td>{{ $s->student_name }}</td>
                          {{-- <td>{{ $s->class_name }}</td> --}}
                          <td>{{ $s->school_name }}</td>
                      
                          {{-- <td>{{ $s->mother_mobile }}</td> --}}
                          <td>{{ $s->sms_mobile }}</td>
                          <td>{{ $s->roll_number }}</td>
                          <td style="min-width: 262px;">

 {{--                            <fieldset>
    <legend>Select a Location: </legend>
    <label for="radio-1">New York</label>
    <input type="radio" name="radio-1" id="radio-1">
    <label for="radio-2">Paris</label>
    <input type="radio" name="radio-1" id="radio-2">

  </fieldset> --}}
                      
                   <label for="radio-1">Present</label>
                <input type="radio" name="attendance[{{ $s->id }}]" id="radio-1" value="1">
                <label for="radio-2">Absense</label>
                <input type="radio" name="attendance[{{ $s->id }}]" id="radio-2" value="2" checked="">
                      
                          </td>
                      </tr>
                      @endforeach 
                  
                        
                    </tbody>

                    @if(count($student)>0)
                      <tr>
                      <td colspan="6" >
                        <button type="submit" class="btn btn-block my-btn-submit">Submit Attendance</button>
                      </td>
                    </tr>
                    @endif
                </table>
            </div>

@else

<span style="text-align: center;color: red;font-weight: bold;margin-left: 43%;font-size: 24px" align="center" class="text-center">Student Not Foune!!!!</span>
@endif







<script type="text/javascript">
    $( function() {
    $( "input" ).checkboxradio();

    $( "#elem" ).prprogressbar({
  classes: {
    "ui-progressbar": "highlight"
  }
});
  } );

$(document).click(function(){
  $('#elem').toggle('swing');
});
</script>