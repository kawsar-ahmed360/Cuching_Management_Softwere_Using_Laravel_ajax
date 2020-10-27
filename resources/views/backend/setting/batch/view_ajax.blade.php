
@php($sl=1)

@foreach($batch as $b)

<tr>
   <td>{{ $sl++ }}</td>
   <td>{{ $b->class_name }}</td>
   <td>{{ $b->courch_type }}</td>
   <td>{{ $b->batch_name }}</td>
   <td>{{ $b->student_capaticy }}</td>

   <td>
     
     @if($b->status=='1')
     <span class="badge badge-warning">Deactive</span>
       @else
     <span class="badge badge-success">Active</span>
     @endif
   </td>

   <td>
    @if($b->status=='1')

      <button type="" onclick="Active('{{ $b->id }}')" class="btn btn-success btn-sm"><i class="fa fa-arrow-alt-circle-down"></i></button>
    @else

      <button type="" onclick="Deactive('{{ $b->id }}')" class="btn btn-warning btn-sm"><i class="fa fa-arrow-alt-circle-up"></i></button>
    @endif
      <button type="" onclick="editebat('{{ $b->id }}','{{ $b->class_id }}','{{ $b->batch_name }}','{{ $b->student_capaticy }}')" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
      <button type="" onclick="del('{{ $b->id }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
   </td>
</tr>

@endforeach
