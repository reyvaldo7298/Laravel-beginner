@extends('dashboard')
@section('content')
<table>
    @foreach ($pegawai as $p)
    <tr>
        <td>{{ $p->name }}</td>
        <td>{{ $p->position->position }}</td>
    </tr>
    @endforeach
    {{ $pegawai->links() }}
</table>

@endsection