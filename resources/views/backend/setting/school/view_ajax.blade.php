 

            @php($sl=1)

            @foreach($school as $s)

            <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $s->school_name }}</td>
                <td>
                    @if($s->status=='1')
                     <span class="badge badge-warning">Deactive</span>
                   @else
                     <span class="badge badge-success">Active</span>
                    @endif
                </td>

                <td>
                    @if($s->status=='1')
                    <button type="" onclick="active('{{ $s->id }}')" class="btn btn-success btn-sm"><i class="fa fa-arrow-alt-circle-down"></i></button>
                     @else
                    <button type="" onclick="deactive('{{ $s->id }}')" class="btn btn-warning btn-sm"><i class="fa fa-arrow-alt-circle-up"></i></button>
                    @endif
                    <button type="" onclick="edite('{{ $s->id }}','{{ $s->school_name }}')" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="" onclick="del('{{ $s->id }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </td>
            </tr>

            @endforeach