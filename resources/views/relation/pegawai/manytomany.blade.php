@extends('dashboard')
@section('content')

    @foreach ($pegawai as $p)
    <ul>
        <li>{{ $p->name }}</li>
        <ol>
            @foreach ($p->hobi as $hobby)
            <li>{{ $hobby->nama }}</li>
            @endforeach
        </ol>
    </ul>
    @endforeach
    {{ $pegawai->links() }}
@endsection