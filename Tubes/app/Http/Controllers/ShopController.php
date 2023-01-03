<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $data = Sampah::where('status' , 'sell')->get();
        return view('shop.index' , ['data' => $data]);
    }

    public function detail($id){
        $data = Sampah::find($id);
        return view('shop.detail' , ['data' => $data]);
    }
}
