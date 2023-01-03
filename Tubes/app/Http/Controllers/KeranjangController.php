<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{

    public function detail(){
        $data = Keranjang::where('user_id', Auth::user()->id)->get();
        return view('keranjang.index' , ['data' => $data]);
    }
    public function post($id, Request $request){
        $data = new Keranjang();
        $data->user_id = Auth::user()->id;
        $data->sampah_id = $id;
        $data->status = 'keranjang';
        $data->qty = $request->qty;
        $data->save();

        return redirect()->back();

    }

    public function edit($id, Request $request){
        $data = Keranjang::find($id);
        $data->status = 'keranjang';
        $data->qty = $request->qty;
        $data->save();
        return redirect()->route('keranjang.detail');
    }

    public function delete($id){
        $data = Keranjang::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function editdetail($id){
        $data = Keranjang::find($id);
        return view('shop.edit' , ['data'=>$data]);
    }

}
