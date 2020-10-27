
@if(count($att)>0)

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
                      @foreach($att as $s)
                       <tr>
                          <td>{{ $sl++ }}</td>
                          <td>{{ $s->student_name }}</td>
                          {{-- <td>{{ $s->class_name }}</td> --}}
                          <td>{{ $s->school_name }}</td>
                      
                          {{-- <td>{{ $s->mother_mobile }}</td> --}}
                          <td>{{ $s->sms_mobile }}</td>
                          <td>{{ $s->roll_number }}</td>
                          <td style="min-width: 262px;">

                                
                                <span class="badge badge-{{ $s->attendance==1?'success':'danger' }}">{{ $s->attendance ==1?'Present':'Absence' }}</span>
                      
                      
                          </td>
                      </tr>
                      @endforeach 
                  
                        
                    </tbody>

                
                </table>
            </div>

@else

<span style="text-align: center;color: red;font-weight: bold;margin-left: 43%;font-size: 24px" align="center" class="text-center">Student Not Foune!!!!</span>
@endif






{{-- 
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
</script> --}}