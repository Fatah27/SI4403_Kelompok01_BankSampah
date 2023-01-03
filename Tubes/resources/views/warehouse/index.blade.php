@extends('layouts.app')
@section('content')
    <div class="container p-5">
        <h1 class="m-3">My Warehouse</h1>
        <div class="d-flex flex-wrap">
        @foreach ($data as $x)
            <div class="card m-2" style="width: 18rem;">
                <img src="{{asset('/sampah/'.$x->foto)}}" class="card-img-top h-50" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$x->nama}}</h5>
                    <p class="card-text">{{$x->jenis_sampah}}</p>
                    <div class="d-flex">
                    <a href="{{route('warehouse.edit' , ['id'=>$x->id])}}" class="m-1 btn w-50 btn-warning text-white">Update</a>
                    <a href="{{route('warehouse.delete' , ['id'=>$x->id])}}" class="m-1 btn w-50 btn-danger">Delete</a>
                    </div>
                    @if($x->status == 'hide')
                    <a href="{{route('warehouse.sell' ,['id'=>$x->id])}}" class="btn btn-success d-block text-center">Sell</a>
                    @else
                        <a href="{{route('warehouse.hide' , ['id'=>$x->id])}}" class="btn btn-outline-secondary d-block text-center">Hide</a>
                        @endif
                </div>
            </div>
        @endforeach
        </div>
    </div>

    <a href="{{route('warehouse.add')}}" id="fixedbutton" class="btn bgs">+</a>
@endsection
