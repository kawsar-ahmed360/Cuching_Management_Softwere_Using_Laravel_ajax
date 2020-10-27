
 
 <tr>
                        <th colspan="2"><img src="{{ $user->avater?url('public/backend/profile/'.$user->avater):url('public/backend/avater.png') }}" width="340px" style="border-radius: 8px" height="340px" alt="">
                        	<p>Dhaka,Bangladesh</p> 
                        	 @if($user->role=='admin')
                        	<span  class="badge badge-success" style="font-size: 20px">Admin<span>
                        	@else
                        	<span class="badge badge-warning" style="font-size: 20px">User</span>

                        	@endif
                        </th>
                         

                    </tr>
                    <tr>
                    	<th>Name <td>{{ $user->name }}</td></th>
                    </tr>

                     <tr>
                    	<th>Email <td>{{ $user->email }}</td></th>
                    </tr>

                     <tr>
                    	<th>Mobile <td>{{ $user->mobile }}</td></th>
                    </tr>
                    <tr>
                    	<th colspan="2">
                    		<button onclick="edite_info('{{ $user->id }}','{{ $user->name }}','{{ $user->email }}','{{ $user->mobile }}')" class="btn btn-info btn-sm">Edite Info</button>
                    		<button onclick="edite_pass('{{ $user->id }}')" class="btn btn-danger btn-sm">Password Change</button>
                    		<button onclick="image('{{ $user->id }}')" class="btn btn-warning btn-sm">Upload Image</button>
                    	</th>
                    </tr>