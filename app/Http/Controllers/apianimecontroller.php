<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnimeModel;

class apianimecontroller extends Controller
{
    public function get_all_anime(){
        return response()->json(AnimeModel::all(),200);
    }
    public function insert_data_anime(Request $request){
        $insert_anime = new AnimeModel;
        $insert_anime->nama_anime = $request->nmanime;
        $insert_anime->jumlah_eps = $request->jmlheps;
        $insert_anime->save();
        return response([
            'status'=>'OK',
            'message'=>'Anime Tersimpan',
            'data'=>$insert_anime
        ],200);
    }
    public function update_data_anime(Request $request, $id){
        $check_anime = AnimeMOdel::firstWhere('kode_anime',$id);
        if($check_anime){
            $data_anime = AnimeMOdel::find($id);
            $data_anime->nama_anime = $request->nmanime;
            $data_anime->jumlah_eps = $request->jmlheps;
            $data_anime->save();
            return response([
                'status'=>'OK',
                'message'=>'Data Anime Terubah',
                'update-data'=>$data_anime
            ],200);
        }else{
            return response([
                'status'=>'Not Found',
                'message'=>'Kode Anime Tidak Ditemukan',
            ],404); 
        }
    }
    public function delete_data_anime($id){
        $check_anime = AnimeModel::firstWhere('kode_anime',$id);
        if($check_anime){
            AnimeModel::destroy($id);
            return response([
                'status'=>'OK',
                'message'=>'Data Terhapus'
            ],200);
        }else{
            return response([
                'status'=>'Not Found',
                'message'=>'Kode Barang Tidak Ditemukan'
            ],404);
        }
    }
}
