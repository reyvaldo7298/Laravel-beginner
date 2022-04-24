@extends('dashboard')
@section('content')

	<div class="row">
		<div class="col-md-4">
			<h3 class="mb-3">Edit Permission User</h3>

			
			{{ csrf_field() }}
			Name : 
			{{ $users->name }}
			<br>
			Role : 
			@foreach($users->getRoleNames() as $role)
				{{ $role }}
			@endforeach
			<br>
			<br>

			<form action="{{ route('storeUser') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<h5>Role</h5>
				@foreach ($roles as $r)
					<div class="form-check">
						<input class="form-check-input" {{$users->hasRole($r->name) ? 'checked':''}} name="role[]" type="checkbox" value="{{ $r->name }}" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">
							{{ $r->name }}
						</label>
					</div>
				@endforeach
				<br>

				<h5>Permission</h5>
				<input type="hidden" name="id" value="{{ $users->id }}">
				@foreach ($permissions as $p)
					<div class="form-check">
						<input class="form-check-input" {{$users->can($p->name) ? 'checked':''}} name="permission[]" type="checkbox" value="{{ $p->name }}" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">
							{{ $p->name }}
						</label>
					</div>
				@endforeach
				
				<input class="btn btn-success mt-2" type="submit" value="Submit">
			</form>
		</div>
	</div>

@endsection