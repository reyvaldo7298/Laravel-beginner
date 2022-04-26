@extends('dashboard')
@section('content')

    {{-- {{ $pegawai }} --}}
    <a href="{{ route('formMMPegawai') }}">Tambah pegawai</a>
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