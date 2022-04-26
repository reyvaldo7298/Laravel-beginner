@extends('dashboard')
@section('content')

    {{-- {{ $pegawai }} --}}
    <a href="{{ route('formMMPegawai') }}">+ Tambah pegawai</a>
    <table class="table table-hover">
        <tr>
            <th>Nama</th>
            <th>Hobby</th>
        </tr>
        @foreach ($pegawai as $p)
        <tr>
            <td>{{ $p->name }}</td>
            <td>
                <ul>
                @foreach ($p->hobi as $hobby)
                    <li>{{ $hobby->nama }}</li>
                @endforeach
                </ul>
            </td>
        </tr>
        @endforeach
    </table>
    
    <div class="float-end">
        {{ $pegawai->links() }}
    </div>
@endsection