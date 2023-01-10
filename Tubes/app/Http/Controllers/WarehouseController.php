<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{
    public function index(){
        $data = Sampah::where('user_id' , Auth::user()->id)->get();
        return view('warehouse.index' , ['data'=>$data]);
    }


    public function add(){
        return view('warehouse.add');
    }

    public function edit($id){
        $data = Sampah::find($id);
        return view('warehouse.edit' , ['data'=>$data]);
    }

    public function put($id , Request $request){
        $data = Sampah::find($id);
        $data->user_id = Auth::user()->id;
        $data->nama = $request->nama;
        $data->jenis_sampah = $request->jenis_sampah;
        $data->lokasi = $request->lokasi;
        $data->harga = $request->harga;
        $data->kota = $request->kota;
        $data->provinsi = $request->provinsi;
        $data->deskripsi = $request->deskripsi;
        $data->status = 'hide';
        if ($request->sampah != null){
            $file = $request->file('sampah');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'sampah';
            $file->move($tujuan_upload,$nama_file);
            $data->foto = $nama_file;
        }
        $data->update();
        return redirect()->route('warehouse.index');
    }

    public function tambah(Request $request){
        $data = new Sampah();
        $data->user_id = Auth::user()->id;
        $data->nama = $request->nama;
        $data->jenis_sampah = $request->jenis_sampah;
        $data->lokasi = $request->lokasi;
        $data->harga = $request->harga;
        $data->kota = $request->kota;
        $data->provinsi = $request->provinsi;
        $data->deskripsi = $request->deskripsi;
        $data->status = 'hide';
        if ($request->sampah != null){
            $file = $request->file('sampah');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'sampah';
            $file->move($tujuan_upload,$nama_file);
            $data->foto = $nama_file;
        }
          $data->save();
        return redirect()->route('warehouse.index');
    }

    public function sell($id){
        $data = Sampah::find($id);
        $data->status = 'sell';
        $data->save();
        return redirect()->back();
    }

    public function hide($id){
        $data = Sampah::find($id);
        $data->status = 'hide';
        $data->save();
        return redirect()->back();
    }

    public function delete($id){
        $data = Sampah::find($id);
        $data->delete();
        return redirect()->back();
    }
}
