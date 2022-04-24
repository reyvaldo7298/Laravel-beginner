@extends('dashboard')
@section('content')

<h3>Data User</h3>

	<table class="table table-hover">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Role</th>
			<th>Action</th>
        </tr>
        
        {{-- {{ $hobby->image }} --}}
		@foreach($users as $user)
		<tr>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>
				@foreach($user->getRoleNames() as $role)
					{{ $role }}
				@endforeach
			</td>
			<td>
				<a class="btn btn-warning" href="edit-user/{{ $user->id }}">Edit</a>
			</td>
		</tr> 
		@endforeach
	</table>
@endsection