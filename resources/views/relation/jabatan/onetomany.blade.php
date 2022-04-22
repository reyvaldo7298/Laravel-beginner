@extends('dashboard')
@section('content')

    @foreach ($jabatan as $j)
    <ul>
        <li>{{ $j->position }}</li>
        <ol>
            @foreach ($j->employee as $employee)
            <li>{{ $employee->name }}</li>
            @endforeach
        </ol>
    </ul>
    @endforeach
    {{ $jabatan->links() }}

@endsection