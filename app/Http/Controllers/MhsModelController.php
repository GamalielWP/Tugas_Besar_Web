<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MhsModel;
use DataTables;

class MhsModelController extends Controller
{
    public function index(){
        $data['title']="Data Mahasiswa";
        $data['mahasiswa']=MhsModel::all();

        return view('mahasiswa',$data);
    }

    public function create(){
        $data['gender']=['L','P'];
        $data['departement']=['S1 RPL','S1 Informatika','S1 Sistem Informasi'];

        return view('mahasiswa_create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'nim'=>'required|size:8,unique:mhs_models',
            'name'=>'required|min:3|max:50',
            'gender'=>'required|in:P,L',
            'departement'=>'required',
            'address'=>'',
        ]);

        $mhs=new MhsModel();
        $mhs->nim=$request->nim;
        $mhs->name=$request->name;
        $mhs->gender=$request->gender;
        $mhs->departement=$request->departement;
        $mhs->address=$request->address;
        $mhs->save();

        return redirect(route('mahasiswa.index'))->with('pesan','Data berhasil ditambahkan');
    }

    public function edit($id){
        $data['gender']=['L','P'];
        $data['departement']=['S1 RPL','S1 Informatika','S1 Sistem Informasi'];
        $data['mahasiswa']= MhsModel::find($id);

        return view('mahasiswa_edit',$data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nim'=>'required|size:8,unique:mhs_models',
            'name'=>'required|min:3|max:50',
            'gender'=>'required|in:P,L',
            'departement'=>'required',
            'address'=>'',
        ]);

        $mahasiswa=MhsModel::find($id);
        $mahasiswa->nim=$request->nim;
        $mahasiswa->name=$request->name;
        $mahasiswa->gender=$request->gender;
        $mahasiswa->departement=$request->departement;
        $mahasiswa->address=$request->address;
        $mahasiswa->save();

        return redirect(route('mahasiswa.index'))->with('pesan','Data berhasil diperbarui');
    }

    public function destroy($id){
        $mahasiswa=MhsModel::find($id);
        $mahasiswa->delete();

        return redirect(route('mahasiswa.index'))->with('pesan','Data berhasil dihapus');
    }

    public function data(Request $request){
        if($request->ajax()){
            $data=MhsModel::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $btn='
                        <div class="text-center">
                            <div class="btn-group">
                                <a href="'.route('mahasiswa.edit',['id' => $row->id]).'" class="edit btn btn-success btn-sm">Edit</a>
                                <a href="'.route('mahasiswa.data.destroy',['id' => $row->id]).'" class="btn btn-danger btn-sm">Hapus</a>
                            </div>
                        </div>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('mahasiswa_data');
    }
}