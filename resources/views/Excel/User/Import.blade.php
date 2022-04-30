@extends('dashboard')
@section('content')

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import Export Excel To Database
        </div>
        <div class="card-body">
            <form action="{{ route('import.user') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
                <a class="btn btn-warning" href="{{ route('export.user') }}">Export User Data</a>
            </form>
        </div>
    </div>
</div>

@endsection
