@extends('dashboard')
@section('content')

	<div class="row">
        <div class="col-md-4">
            <h2 class="mb-3">Form Hobbies</h2>
            <form action="{{ route('storeHobbies') }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Hobi">
                </div>
        
                <div class="form-group mt-3">
                    <label for="imagelabel">Image</label>
                    <input type="file" class="form-control" id="imagelabel" name="image">    
                </div>
        
                <input class="btn btn-primary mt-2 float-end" type="submit" value="Simpan">
            </form>

            @if(session()->get('status'))
                <br><br>
                <div class="alert alert-success mt-2">
                    {{ session()->get('status') }}
                </div>
            @endif
            @error('image')
                <div class="alert alert-danger mt-1 mb-1 text-center">{{ $message }}</div>
            @enderror

            @if(session()->get('path'))
                <img style="height:300px" src="{{ route('image.displayImage',session()->get('path')) }}" alt="" title="">
            @endif
        </div>
        <div class="col-md-8"></div>

        
    </div>
@endsection