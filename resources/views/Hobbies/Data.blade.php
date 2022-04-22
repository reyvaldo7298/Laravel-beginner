@extends('dashboard')
@section('content')

<h3>Data hobby</h3>

	<table class="table table-hover">
		<tr>
			<th>Image</th>
        </tr>
        
        {{-- {{ $hobby->image }} --}}
		@foreach($hobby->image as $i)
		<tr>
			<td>{{ $i->image }}</td>
            <td>
                <img style="height:200px" src="{{ route('image.displayImage',$i->image) }}" alt="" title="">
            </td>
		</tr> 
		@endforeach
	</table>
@endsection