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

            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $request->file('gambar')->move('statics/img/',$filename);
            $photo = 'statics/img'.$filename;

            $data = new Barang();
            $data->nama_barang   = $request->input('nama_barang');
            $data->gambar        = $photo;
            $data->deskripsi     = $request->input('deskripsi');
            $data->harga         = $request->input('harga');
            $data->stok          = $request->input('stok');
            $data->lokasi        = $request->input('lokasi');
            $data->kontak        = $request->input('kontak');
            $data->save();
            return response()->json([
                'status'    => '1',
                'message'   => 'Tambah Barang Berhasil!'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   =>  'Tambah Barang Gagal!'

            ]);
        }
    }
    public function update(Request $request, $id){
        // $file = $request->file('gambar');
        // if($file){
        //     $filename = $file->getClientOriginalName();
        //     $request->file('gambar')->move('statics/img/',$filename);
        //     $photo = 'statics/img'.$filename;
        // } else{
        //     $barang = Barang::find($id);
        //     $photo = $barang->gambar;
        // }
        try {
            $data = Barang::where('id',$id)->first();
            $data->nama_barang  = $request->input('nama_barang');
            $data->gambar       = $request->input('gambar');
            $data->deskripsi    = $request->input('deskripsi');
            $data->harga        = $request->input('harga');
            $data->stok         = $request->input('stok');
            $data->lokasi       = $request->input('lokasi');
            $data->kontak       = $request->input('kontak');
            $data->save();
            return response()->json([
                'status'    => '1',
                'message'   => 'Ubah Data Barang Berhasil!'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   =>  $e->getMessage()
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
