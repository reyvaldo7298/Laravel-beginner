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
			<th>Image</th>
			<th>Preview</th>
		</tr>
		@foreach($employee->image as $p)
		<tr>
			<td>{{ $p->name }}</td>
			<td>{{ $p->image }}</td>
			<td>
				<img style="height:200px" src="{{ route('image.displayImage',$p->image) }}" alt="" title="">
			</td>
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