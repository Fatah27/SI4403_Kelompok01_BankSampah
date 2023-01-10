@extends('layouts.app')

@section('content'
)

    <div class="container">
        <h1 class="h1">My Orders</h1>
        <div class="d-flex flex-wrap">
        @foreach ($data as $x)
            <div class="card m-2" style="width: 18rem;">
                <div class="card-header h-100 p-3" style="overflow: hidden">
                    <h3>Invoice Number : INV{{$x->id}}</h3>
                    <img src="{{asset('/sampah/'.$x->sampah->foto)}}" class="card-img-top h-100" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nama Pemesan : {{$x->order->full_name}}</h5>
                    <h5 class="card-title">Nomer Telepon : {{$x->order->phone_number}}</h5>
                    <h5 class="card-title">alamat : {{$x->order->address}}</h5>
                    <h5 class="card-title">Shipping : {{$x->order->shipping}}</h5>
                    <h5 class="card-title">Total Barang : {{$x->total}}</h5>
                </div>
                <div class="card-footer">
                    @if ($x->status == 'dibayar')
                        <a href="{{route('order.kirim' ,['id'=>$x->id])}}" class="btn btn-success d-block text-center">Kirim</a>
                    @elseif($x->status == 'dikirim')
                        <a href="" class="btn btn-secondary disabled w-100" disabled>Dikirim</a>
                    @elseif($x->status == 'diterima')
                        <div class="d-flex">
                            <a href="" class="btn btn-success disabled w-100 m-2" disabled>barang diterima</a>
                        </div>
                    @endif
                </div>

            </div>
            @endforeach
        </div>

    </div>
    @endsection
