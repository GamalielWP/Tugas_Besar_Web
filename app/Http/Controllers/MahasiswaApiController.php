<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\MhsModel;

class MahasiswaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = MhsModel::all();
        return response()->json($student, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi data dengan true false
        $validateData = Validator::make($request->all(),[
            'nim'=>'required|size:8|unique:mhs_models,nim',
            'nama'=>'required|min:3|max:50',
            'jenis_kelamin'=>'required|in:P,L',
            'jurusan'=>'required',
            'alamat'=>' ',
        ]);

        if($validateData->fails()){
            return response($validateData->errors(),400);
        }else{
            $mahasiswa=new MhsModel();
            $mahasiswa->nim = $request->nim;
            $mahasiswa->name = $request->nama;
            $mahasiswa->gender = $request->jenis_kelamin;
            $mahasiswa->departement = $request->jurusan;
            $mahasiswa->address = $request->alamat;
            $mahasiswa->save();
            return response()->json([
                'message' => 'Data terekam'
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //divalidasi dengan id lalu mengedit data
        if(MhsModel::where('id', $id)->exists()) {
            $validateData = Validator::make($request->all(),[
                'nim' => 'required|size:8|unique:mhs_models,nim',
                'nama' => 'required|min:3|max:50',
                'jenis_kelamin' => 'required|in:P,L',
                'jurusan' => 'required',
                'alamat' => ' ',
            ]);

            if($validateData->fails()) {
                return response($validateData->errors(), 400);
            }else{
                $mahasiswa = Mhsmodel::find($id);
                $mahasiswa->nim = $request->nim;
                $mahasiswa->name = $request->nama;
                $mahasiswa->gender = $request->jenis_kelamin;
                $mahasiswa->departement = $request->jurusan;
                $mahasiswa->address = $request->alamat;
                $mahasiswa->save();
                return response()->json([
                    'message' => 'Data ter-update'
                ], 201);
            }
        } else {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //divalidasi dengan id lalu menghapus data
        if(MhsModel::where('id', $id)->exists()){
            $mahasiswa = MhsModel::find($id);
            $mahasiswa->delete();
            return response()->json([
                'message' => 'Data terhapus'
            ], 404);
        } else {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }
}
