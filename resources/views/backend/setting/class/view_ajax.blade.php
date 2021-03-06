@php($sl=1)

@foreach($class as $c)

 <tr>
 	<td>{{ $sl++ }}</td>
 	<td>{{ $c->class_name }}</td>
 	<td>
 		@if($c->status=='1')
           <span class="badge badge-warning">Deactive</span>
           @else
           <span class="badge badge-success">Active</span>
 		@endif
 	</td>

 	<td>
 		@if($c->status=='1')
            <button onclick="active('{{ $c->id }}')" class="btn btn-success btn-sm"><i class="fa fa-arrow-alt-circle-down"></i></button>
 		@else
            <button onclick="deactive('{{ $c->id }}')" class="btn btn-warning btn-sm"><i class="fa fa-arrow-alt-circle-up"></i></button>

 		@endif
            <button onclick="editeclas('{{ $c->id }}','{{ $c->class_name }}')" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
            <button onclick="del('{{ $c->id }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
 	</td>
 </tr>

@endforeach