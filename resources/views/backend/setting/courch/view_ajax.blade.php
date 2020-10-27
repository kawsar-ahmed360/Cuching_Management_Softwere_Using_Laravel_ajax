@if(count($courch)>0)

@php($sl=1)

@foreach($courch as $c)

<tr>
	<td>{{ $sl++ }}</td>
	<td>{{ $c->class_name }}</td>

	<td>{{ $c->courch_type }}</td>
	<td>
		@if($c->status=='1')
		<span class="badge badge-warning">Deactive</span>
       @else
		<span class="badge badge-success">Active</span>
		@endif
	</td>

	<td>
		@if($c->status=='1')
		 <button onclick="Active('{{ $c->id }}')" class="btn btn-success btn-sm"><i class="fa fa-arrow-alt-circle-down"></i></button>
       @else
		 <button onclick="Deactive('{{ $c->id }}')" class="btn btn-warning btn-sm"><i class="fa fa-arrow-alt-circle-up"></i></button>
		
		@endif
		 <button onclick="Edite('{{ $c->id }}','{{ $c->class_id }}','{{ $c->courch_type }}')" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
		 <button onclick="Del('{{ $c->id }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
	</td>
</tr>

@endforeach
@else



@endif