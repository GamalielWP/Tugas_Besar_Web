<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien_Bio;
use App\Admin_Bio;
use App\Panggil_Pasien;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TubesWebController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function dropbox(){
        $data['gender']=['Laki-laki','Perempuan'];
        $data['poly']=['Anak','Gigi','Mata','Paru','Penyakit Dalam'];
        $data['need_to']=['Registrasi Baru','Control'];

        return view('regis',$data);
    }

    public function simpan(Request $request){
        $request->validate([
            'need_to'=>'required',
            'nik'=>'required|size:16',
            'bpjs'=>'',
            'rm'=>'',
            'poly'=>'required|in:Anak,Gigi,Mata,Paru,Penyakit Dalam',
            'name'=>'required|min:3|max:50',
            'birth'=>'required',
            'gender'=>'required|in:Perempuan,Laki-laki',
            'address'=>'required',
            'phone'=>'required',
        ]);

        $psn=new Pasien_Bio();
        $psn->need_to = $request->need_to;
        $psn->nik = $request->nik;
        $psn->bpjs = $request->bpjs;
        $psn->med_rec = $request->rm;
        $psn->poly = $request->poly;
        $psn->name = $request->name;
        $psn->birth = $request->birth;
        $psn->gender = $request->gender;
        $psn->address = $request->address;
        $psn->phone = $request->phone;
        $psn->status = 'ditangani';
        $psn->add_time = Carbon::now()->format('Y-m-d');
        $psn->save();

        return redirect(route('datapasien',['id' => $psn->id]));
    }

    public function data_pasien($id){
        $data['pasien']=Pasien_Bio::find($id);
        $date['tanggal']=Carbon::now()->format('Y-m-d');

        $data['no_daftar']=Pasien_Bio::where('id','<=',$id)
        ->where('add_time','=',$date)
        ->count();

        $data['admin_call']=Panggil_Pasien::first();

        return view('pasien_data',$data);
    }

    public function update_numb_regis(Request $request, $id)
    {
        $data = Pasien_Bio::find($id);
        $data->numb_regis = $request->numb_regis;
        $data->save();

        return redirect(route('polipasien',['id' => $data->id,'poly' => $data->poly]));
    }

    public function poli_pasien($id, $poly){
        $date['tanggal']=Carbon::now()->format('Y-m-d');
        $data['pasien']=Pasien_Bio::find($id);
        $data['cari_poli']=Pasien_Bio::find($poly);
        $data['no_poli']=Pasien_Bio::where('id','<=',$id)
        ->where('poly','=',$poly)
        ->where('add_time','=',$date)
        ->count();

        $data['admin_call']= Panggil_Pasien::first();

        return view('pasien_poli',$data);
    }

    public function update_numb_poly_status(Request $request, $id)
    {
        $request->validate([
            'numb_poly'=>'required',
        ]);

        $data = Pasien_Bio::find($id);
        $data->numb_poly = $request->numb_poly;
        $data->status = $request->status;
        $data->save();

        return redirect(route('index'))->with('pesansukses','Semoga lekas sembuh :)');
    }

    /*function _construct(){
        $this->middleware('kode_log')->only('login_pasien');
    }*/

    public function login_pasien(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $date['tanggal']=Carbon::now()->format('Y-m-d');
        $user = Pasien_Bio::where('nik', $request->code)
            ->where('add_time','=',$date)
            ->where('status','ditangani')
            ->first();

        if($user){
            //if(Hash::check($request->code)){
                session([
                    'codes' => $user->id,
                ]);
            //}

            return redirect(route('datapasien',['id' => $user->id]));
        }
        else{
            return redirect(route('index'))->with('pesan','Kode anda tidak valid !');
        }
    }

    public function admin_umum(Request $request, $id){
        if($request->ajax()){
            $data = Pasien_Bio::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        $data['admin_call']= Panggil_Pasien::first();
        $data['admin']= Admin_Bio::where('id', $id)->first();
        return view('admin_umum',$data);
    }

    public function admin_poli(Request $request, $id){
        if($request->ajax()){
            $data = Pasien_Bio::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        $data['poly']=['Anak','Gigi','Mata','Paru','Penyakit Dalam'];
        $data['admin_call']= Panggil_Pasien::first();
        $data['admin']= Admin_Bio::where('id', $id)->first();
        return view('admin_poli',$data);
    }

    /*public function logout(){
        session()->flush();
        return redirect(route('index'));
    }*/

    public function index_login_staff(){
        return view('login');
    }

    public function login_staff(Request $request)
    {
        $request->validate([
            'nip' => 'required',
        ]);
        $divisi="umum";
        $sector = Admin_Bio::where('nip', $request->nip)
            ->where('sector', $divisi)
            ->first();
        $user = Admin_Bio::where('nip', $request->nip)
            ->first();
        //var_dump($user);
        //die();
        if ($sector) {
            if($user){
                //if(Hash::check($request->code)){
                    session([
                        'no_nip' => $user->id,
                    ]);
                //}
                return redirect(route('adminumum',['id' => $user->id]));
            }
            else{
                return redirect(route('loginstaff'))->with('pesan','Password anda salah !');
            }
        }else{
            if($user){
                //if(Hash::check($request->code)){
                    session([
                        'no_nip' => $user->id,
                    ]);
                //}
                return redirect(route('adminpoli',['id' => $user->id]));
            }
            else{
                return redirect(route('loginstaff'))->with('pesan','Password anda salah !');
            }
        }

    }

    public function call(Request $request, $id)
    {
        $request->validate([
            'quantity'=>'required',
        ]);

        $panggil = Panggil_Pasien::first();
        $panggil->number_call = $request->quantity;
        $panggil->save();
        
        $user = Admin_Bio::where('id', $id)->first();

        return redirect(route('adminumum',['id' => $user->id]));
    }
    public function callpoly(Request $request, $id)
    {
        $request->validate([
            'quantity_poly'=>'required',
            'poli'=>'required',
        ]);

        $panggil = Panggil_Pasien::first();
        $panggil->number_call_poly = $request->quantity_poly;
        $panggil->poly = $request->poli;
        $panggil->save();
        
        $user = Admin_Bio::where('id', $id)->first();

        return redirect(route('adminpoli',['id' => $user->id]));
    }
}
