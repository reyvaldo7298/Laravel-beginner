@extends('dashboard')
@section('content')
<div class="row">
    <div class="col-md-4">
        <h3 class="mb-3">Form Data Pegawai</h3>

        <form action="{{ route('storeMMPegawai') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            @error('image')
                <div class="alert alert-danger mt-1 mb-1 text-center">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
            </div>

            <div class="form-group mt-2">
                <label for="jabatan">Jabatan</label>
                <select class="form-select" id="jabatan" name="jabatan" required>
                    <option selected>Pilih Jabatan</option>
                    @foreach ($position as $position) 
                        <option value="{{ $position->id }}">{{ $position->position }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-2">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" placeholder="Alamat Lengkap" name="alamat" id="alamat" style="height: 100px"></textarea>
            </div>

            <label class="mt-2" for="hobby">Hobi</label>
            @foreach ($hobbies as $h)
                <div class="form-check">
                    <input class="form-check-input" name="hobby[]" type="checkbox" value="{{ $h->id }}" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $h->nama }}
                    </label>
                </div>
            @endforeach

            <div class="form-group mt-2">
                <label for="imagelabel">Image</label>
                <input type="file" class="form-control" id="imagelabel" name="image" accept=".jpg, .png, .jpeg, .gif, .svg">    
            </div>

            <input class="btn btn-primary float-end mt-2" type="submit" value="Simpan">
        </form>
    </div>
</div>
@endsection