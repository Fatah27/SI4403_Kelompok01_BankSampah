@extends('layouts.app')
@section('content')
    <div class="container p-5">
        <h1 class="m-3 fs-1 fw-bolder">Kategori</h1>
        <form action="{{route('shop.search')}}" method="get">
            @csrf
            @method('get')
            <div class="row">
                <div class="col">
                    <label for="">Provinsi</label>
                    <input type="text" name="provinsi" class="form-control " >
                </div>

                <div class="col">
                    <label for="">Kota</label>
                    <input type="text" name="kota" class="form-control">
                </div>

                <div class="col">
                    <label for="">Jenis Sampah</label>
                    <input type="text" name="jenis" class="form-control">
                </div>

                <div class="col-1">
                  <br>
                    <button type="submit" class="btn btn-success ">Search</button>
                </div>
            </div>
        </form>

        <img src="{{asset('/image/banner.png')}}" class="img-fluid mt-3" alt="...">
        <div class="d-flex flex-wrap mt-5">
            @foreach ($data as $x)
                <a href="{{route('shop.detail' , ['id'=>$x->id])}}" class="text-decoration-none text-black">
                    <div class="card m-2" style="width: 18rem;">
                    <img src="{{asset('/sampah/'.$x->foto)}}" class="card-img-top h-50" style="min-height: 200px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$x->nama}}</h5>
                        <p class="card-text">{{$x->jenis_sampah}}</p>
                        <div class="text-nowrap" style="">
                            <p class="" style="white-space: nowrap ; width: 200px ; overflow: hidden ; text-overflow:ellipsis;
                            ">{{$x->deskripsi}}</p>
                        </div>
                        <h3>Rp {{$x->harga}}</h3>
                    </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <a href="{{route('keranjang.detail')}}" id="fixedbutton" class="btn bgs">
        <svg width="20" height="63" viewBox="0 0 61 63" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30.3946 24.505H36.2846V15.67H45.1196V9.78008H36.2846V0.945129H30.3946V9.78008H21.5597V15.67H30.3946V24.505ZM18.6147 51.0098C15.3752 51.0098 12.7542 53.6603 12.7542 56.8998C12.7542 60.1393 15.3752 62.7898 18.6147 62.7898C21.8542 62.7898 24.5047 60.1393 24.5047 56.8998C24.5047 53.6603 21.8542 51.0098 18.6147 51.0098ZM48.0645 51.0098C44.8251 51.0098 42.204 53.6603 42.204 56.8998C42.204 60.1393 44.8251 62.7898 48.0645 62.7898C51.304 62.7898 53.9545 60.1393 53.9545 56.8998C53.9545 53.6603 51.304 51.0098 48.0645 51.0098ZM21.8542 36.2849H43.7943C46.0031 36.2849 47.9467 35.0775 48.948 33.2516L60.3157 12.6073L55.162 9.78008L43.7943 30.395H23.1205L10.5749 3.89011H0.944824V9.78008H6.83479L17.4367 32.1325L13.461 39.3183C11.3112 43.2645 14.1383 48.0648 18.6147 48.0648H53.9545V42.1749H18.6147L21.8542 36.2849Z" fill="white"/>
        </svg>
    </a>
@endsection
