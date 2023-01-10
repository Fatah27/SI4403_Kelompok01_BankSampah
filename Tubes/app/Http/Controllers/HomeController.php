<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function detail(){
        return view('detail');
    }

    public function update(Request $request){
        $data = User::find(Auth::id());
        $data->name = $request->name;
        $data->email = $request->tes;
        $data->update();

        return redirect()->back();
    }
}
