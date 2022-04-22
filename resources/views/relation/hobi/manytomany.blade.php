@extends('dashboard')
@section('content')
@foreach ($hobbies as $hobby)
<ul>
    <li>{{ $hobby->nama }}</li>
    <ol>
        @foreach ($hobby->employee as $user)
        <li>{{ $user->name }}</li>
        @endforeach
    </ol>
</ul>
@endforeach
{{ $hobbies->links() }}
@endsection