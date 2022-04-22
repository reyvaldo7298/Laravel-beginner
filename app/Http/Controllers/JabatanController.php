<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\Position;

class JabatanController extends Controller
{
    public function OneToOne(){
        return view('relation.jabatan.onetoone',[
            'title' => 'One To One Jabatan',
            'jabatan' => Position::simplePaginate(1),
        ]);
    }

    public function OneToMany(){
        return view('relation.jabatan.onetomany',[
            'title' => 'One To Many Jabatan',
            'jabatan' => Position::simplePaginate(1),
        ]);
    }
}
