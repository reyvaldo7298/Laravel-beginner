<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hobby;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class HobbyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showData()
    {
        $hobby = Hobby::find(1);

        return view('Hobbies.Data',['hobby' => $hobby]);
    }

    public function viewForm()
    {
        return view('Hobbies.Input');
    }

    public function storeData(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $ori_name = $request->file('image')->getClientOriginalName();
        $name = $request->file('image')->hashName();
        $path = $request->file('image')->store('public/images');

        DB::table('hobbies')->insert([
            'nama' => $request->nama,
            'image_id' => $name
        ]);

        $hobby = Hobby::find(1);

        $image = new Image;
        $image->name = $ori_name;
        $image->image = $name;

        $hobby->image()->save($image);

        return redirect('form-hobbies')->with(
            [
                'status' => 'Upload Success!',
                'path' => $name
            ]
        );
    }

    public function __invoke()
    {
        return view('relation.hobi.manytomany', [
            'title'   => 'Many to Many Hobi',
            'hobbies' => Hobby::simplePaginate(1),
        ]);
    }
}
