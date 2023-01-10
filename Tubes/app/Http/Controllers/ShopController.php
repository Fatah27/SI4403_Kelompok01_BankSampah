<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Sampah;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $data = Sampah::where('status' , 'sell')->get();
        return view('shop.index' , ['data' => $data]);
    }

    public function search(Request $request){
        $data = Sampah::where('status' , 'sell')->where('kota','LIKE','%'.$request->kota.'%')->
        where('jenis_sampah','LIKE','%'.$request->jenis.'%')->where('provinsi','LIKE','%'.$request->provinsi.'%')->get();
        return view('shop.index' , ['data' => $data]);
    }

    public function detail($id){
        $data = Sampah::find($id);
        $feedback = Feedback::where('sampah_id' , $id)->limit(2)->get();
        return view('shop.detail' , ['data' => $data , 'feedback' => $feedback]);
    }
}
