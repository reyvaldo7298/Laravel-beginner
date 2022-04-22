@extends('dashboard')
@section('content')

@foreach ($pegawai as $p)
<ul>
    <li>{{ $p->name }}</li>
    <li>{{ $p->position->position }}</li>
</ul>
@endforeach
{{ $pegawai->links() }}


@endsection