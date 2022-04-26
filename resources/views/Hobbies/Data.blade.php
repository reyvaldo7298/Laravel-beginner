@extends('dashboard')
@section('content')

	<h3>Data hobby</h3>
	<br>
	<a href="{{ route('formHobbies') }}">+ Tambah Data</a>
	<table class="table table-hover">
		<tr>
			<th>Name</th>
			<th>Image</th>
			<th>Preview</th>
        </tr>
        
		{{-- {{ dd($hobby->image) }} --}}
		@foreach($hobby->image as $i)
		<tr>
			@foreach ($data as $d)
				@if ($i->id == $d->id)
					<td>{{ $d->nama }}</td>
				@endif
			@endforeach
			<td>{{ $i->name }}</td>
            <td>
                <img style="height:200px" src="{{ route('image.displayImage',$i->image) }}" alt="" title="">
            </td>
		</tr> 
		@endforeach
	</table>
@endsection