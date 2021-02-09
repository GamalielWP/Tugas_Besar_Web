<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    /*public function index(){
        return view('beranda');
    }

    public function about(){
        return view('about');
    }*/
    public function index_umum(){
        $data['pasien_umum']=TubesWebModel::all();

        return view('pasien_umum',$data);
    }

    public function create(){
        $data['gender']=['L','P'];
        $data['poly']=['Anak','Gigi','Mata','Paru','Penyakit Dalam'];

        return view('pasien_create_regis',$data);
    }

    public function store(Request $request){
        $request->validate([
            'need_to'=>'',
            'nik'=>'required|size:16,unique:pasien_bio',
            'bpjs'=>'size:13,unique:pasien_bio',
            'poly'=>'required|in:Anak,Gigi,Mata,Paru,Penyakit Dalam',
            'name'=>'required|min:3|max:50',
            'birth'=>'required',
            'gender'=>'required|in:P,L',
            'address'=>'required',
        ]);

        $psn=new TubesWebModel();
        $psn->need_to = $request->need_to;
        $psn->nik = $request->nik;
        $psn->bpjs = $request->bpjs;
        $psn->poly = $request->poly;
        $psn->name = $request->name;
        $psn->birth = $request->birth;
        $psn->gender = $request->gender;
        $psn->address = $request->address;
        $psn->save();

        return redirect(route('pasien.index'));
    }
}
