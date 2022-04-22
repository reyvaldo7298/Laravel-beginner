<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Hobby;
use App\Models\Image;
use App\Models\Employee;

class PegawaiController extends Controller
{
    // CRUD
    public function showData()
    {
        $employee = Employee::find(2);
        return view('pegawai.Data',['employee' => $employee]);
    }
    
    public function inputData()
    {
        $position = DB::table('positions')->pluck('id','position');
        return view('pegawai.Input',
            [
                'position' => $position
            ]
        );
    }

    public function storeData(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $ori_name = $request->file('image')->getClientOriginalName();
        $name = $request->file('image')->hashName();
        $path = $request->file('image')->store('public/images');

        DB::table('employees')->insert([
            'name' => $request->nama,
            'position_id' => $request->jabatan,
            'address' => $request->alamat,
            'image_id' => $name
        ]);

        $employee = Employee::find(2);

        $image = new Image;
        $image->name = $ori_name;
        $image->image = $name;

        $employee->image()->save($image);

        return redirect('data-pegawai');
    }

    public function editData($id)
    {
        $pegawai = DB::table('Pegawai')->where('id',$id)->get();
        return view('pegawai.Edit',['pegawai' => $pegawai]);
    }

    public function updateData(Request $request)
    {
        DB::table('Pegawai')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat
        ]);

        return redirect('data-pegawai');
    }

    public function hapusData($id)
    {
        DB::table('Pegawai')->where('id',$id)->delete();
        return redirect('data-pegawai');
    }
    // EOF CRUD

    public function __invoke()
    {
        //One to one
        // return view('relation.pegawai.onetoone',[
        return view('relation.pegawai.onetomany',[
            'title' => 'One to Many Pegawai',
            'pegawai' => Employee::simplePaginate(1),
        ]);
    }

    public function manytomany()
    {
        return view('relation.pegawai.manytomany', [
            'title' => 'Many to Many Pegawai',
            'pegawai' => Employee::simplePaginate(1),
        ]);
    }
}