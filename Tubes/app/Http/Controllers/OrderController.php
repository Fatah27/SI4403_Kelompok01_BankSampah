<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Keranjang;
use App\Models\Order;
use App\Models\Sampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function post(Request $request , $total){

        $data = new Order;
        $data->user_id = Auth::user()->id;
        $data->full_name = $request->full_name;
        $data->phone_number = $request->phone_number;
        $data->address = $request->address;
        $data->shipping = $request->shipping;
        $data->credit_card = $request->credit_card;
        $data->expired = $request->expired;
        $data->password = $request->password;
        $data->total = $total;
        $data->status = 'dibayar';
        $data->save();

        foreach ($request->tes as $x){

            $keranjang = Keranjang::find($x);
            $baru = new Invoice;
            $baru->order_id = $data->id;
            $baru->sampah_id = $keranjang->sampah->id;
            $baru->total = $keranjang->qty;
            $baru->status = 'dibayar';
            $baru->save();
            $keranjang->delete();

        }

        return redirect()->back();
    }
}
