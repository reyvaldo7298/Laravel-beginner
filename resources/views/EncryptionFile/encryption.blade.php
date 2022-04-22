
@extends('dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('file') }}" method="post" enctype="multipart/form-data" class="my-4">
                        @csrf
                    
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file">
                                <label class="custom-file-label" for="file">Choose a file</label>
                            </div>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Upload</button>
                    
                        @if (session()->has('message'))
                            <div class="alert alert-success mt-3">
                                {{ session('message') }}
                            </div>
                        @endif
                    </form>

                    <ul class="list-group">
                        @forelse ($files as $file)
                            <li class="list-group-item">
                                <a href="{{ route('download', basename($file)) }}">
                                    {{ basename($file) }}
                                </a>
                            </li>
                        @empty
                            <li class="list-group-item">You have no files</li>
                        @endforelse
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
