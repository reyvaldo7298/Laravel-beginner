@extends('dashboard')
@section('content')
    <h3>Form Data Pegawai</h3>
 
	<a href="{{ route('showData') }}"> Kembali</a>
	
	<br/>
	<br/>

    @foreach($employees as $p)
	<form action="{{ route('updateData') }}" method="post">
		{{ csrf_field() }}

		<input type="hidden" name="id" value="{{ $p->id }}"> <br/>
		Nama 
        <input type="text" name="nama" required="required" value="{{ $p->name }}"> <br/>
		
        Jabatan 
        <input type="text" name="jabatan" required="required" value="{{ $p->position_id }}"> <br/>
		
        Alamat 
        <textarea name="alamat" required="required">{{ $p->address }}</textarea> <br/>
		<input type="submit" value="Simpan Data">
	</form>
    @endforeach
@endsection