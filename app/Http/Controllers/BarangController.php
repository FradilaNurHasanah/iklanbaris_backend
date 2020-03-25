<?php

namespace App\Http\Controllers;
use App\Barang;
use Auth;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        $data = Barang::all();
        return response($data);
    }
    public function show($id){
        $data = Barang::where('id',$id)->get();
        return response ($data);
    }
    public function store (Request $request){
        try {
            $data = new Barang();
            $data->nama_barang   = $request->input('nama_barang');
            $data->gambar        = $request->input('gambar');
            $data->deskripsi     = $request->input('deskripsi');
            $data->harga         = $request->input('harga');
            $data->stok          = $request->input('stok');
            $data->lokasi        = $request->input('lokasi');
            $data->save();
            return response()->json([
                'status'    => '1',
                'message'   => 'Tambah Barang Berhasil!'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Tambah Data Barang Gagal!'
            ]);
        }
    }
    public function update(Request $request, $id){
        try {
            $data = Barang::where('id',$id)->first();
            $data->nama_barang  = $request->input('nama_barang');
            $data->gambar       = $request->input('gambar');
            $data->deskripsi    = $request->input('deskripsi');
            $data->harga        = $request->input('harga');
            $data->stok         = $request->input('stok');
            $data->lokasi       = $request->input('lokasi');
            $data->save();
            return response()->json([
                'status'    => '1',
                'message'   => 'Ubah Data Barang Berhasil!'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => $validator->errors()
            ]);
        }
    }

    public function destroy($id){
        try {
            $data = Barang::where('id',$id)->first();
            $data->delete();
            
            return response()->json([
                'status'    => '1',
                'message'   => 'Hapus Data Barang Berhasil!'
            ]);
        } catch(\Exception $e) {
            return response()->jsoon([
                'status'    => '0',
                'message'   => 'Hapus Data Barang Gagal!'
            ]);
        }
    }
}
