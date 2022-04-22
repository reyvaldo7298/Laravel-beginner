@extends('dashboard')
@section('content')

@foreach ($jabatan as $j)
<ul>
    <li>{{ $j->position }}</li>
    <li>{{ $j->employee->name }}</li>
</ul>
@endforeach
{{ $jabatan->links() }}

@endsection