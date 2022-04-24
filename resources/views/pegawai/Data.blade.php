@extends('dashboard')
@section('content')
<h3>Data Pegawai</h3>

	{{-- <a href="{{ route('inputData') }}"> + Tambah Pegawai Baru</a> --}}

	@can('Create Pegawai')
	<a href="{{ route('inputData') }}"> + Tambah Pegawai Baru</a>
	@endcan
	<br/>
	<br/>


	<table class="table table-hover">
		<tr>
			<th>Nama</th>
			<th>Alamat</th>
			{{-- <th>Preview</th> --}}
			@can('All Access')
			<th>Action</th>
			@endcan
		</tr>

		{{-- {{ $employee->hobi }} --}}
		{{-- @foreach ($employee->hobi as $e)
			{{ $e->id }}
		@endforeach --}}
		
		@foreach($employee as $p)
		<tr>
			<td>{{ $p->name }}</td>
			<td>{{ $p->address }}</td>
			{{-- <td>
				<img style="height:100px" src="{{ route('image.displayImage',$p->image) }}" alt="" title="">
			</td> --}}
			@can('All Access')
			<td>
				<a href="edit-pegawai/{{ $p->id }}">Edit</a>
				|
				<a href="hapus-pegawai/{{ $p->id }}">Hapus</a>
			</td>
			@endcan	
		</tr>
		@endforeach
		{{-- @foreach($employee as $p)
		<tr>
			<td>{{ $p->name }}</td>
			<td>{{ $p->address }}</td>
			<td>{{ $p->position_id }}</td>
			<td>
				<a href="edit-pegawai/{{ $p->id }}">Edit</a>
				|
				<a href="hapus-pegawai/{{ $p->id }}">Hapus</a>
			</td>
		</tr>
		@endforeach --}}
	</table>
@endsection