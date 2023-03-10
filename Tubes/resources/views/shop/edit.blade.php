@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8  m-3">
                <div class="row border">
                    <div class="col-5 p-5" data-aos="fade-up"
                         data-aos-anchor-placement="top-bottom">
                        <img src="{{asset('/sampah/'.$data->sampah->foto)}}" class="w-100" style="margin-top: 100px" alt="">
                    </div>
                    <div class="col p-5">
                        <h3>{{$data->sampah->nama}}</h3>
                        <h1>Rp. {{$data->sampah->harga}}</h1>
                        <h5>Deskripsi</h5>
                        <p>{{$data->sampah->deskripsi}}</p>
                        <form action="{{route('keranjang.editdetail' , ['id'=>$data->id])}}" method="post">
                            @csrf
                            @method('post')
                            <div class="mt-5">
                                <h5>Quantity</h5>
                                <input type="number" name="qty"  class="form-control" value="{{$data->qty}}">

                                <button type="submit" class="btn btn-success w-100 mt-2 d-block mx-auto"> Edit keranjang</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row border mt-3 p-5">
                    <h1>Feedback</h1>
                </div>
            </div>

            <div class="col-3 border m-3 p-5">
                <p class="text-center">
                    <svg width="109" height="109" viewBox="0 0 109 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M49.6346 6.10556C52.7755 5.64252 56.1729 6.70806 58.6647 9.1999L99.5402 50.146C103.631 54.2371 103.834 60.7289 99.9474 64.6154L64.6154 99.9474C60.7289 103.834 54.2371 103.631 50.146 99.5402L9.1999 58.6647C6.70806 56.1729 5.64252 52.7755 6.10556 49.6346L11.41 13.0472C11.533 12.1992 12.1992 11.533 13.0472 11.41L49.6346 6.10556ZM31.4215 50.4461C36.6533 55.6778 45.2143 55.6778 50.4461 50.4461C55.6778 45.2143 55.6778 36.6533 50.4461 31.4215C45.2143 26.1898 36.6533 26.1898 31.4215 31.4215C26.1898 36.6533 26.1898 45.2143 31.4215 50.4461V50.4461Z" stroke="#276561" stroke-width="10.7489" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </p>

                <h4 class="text-center">Dijual Oleh</h4>
                <h3 class="text-center mb-5">{{$data->user->name}}</h3>

                <p class="text-center">
                    <svg width="182" height="169" viewBox="0 0 182 169" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M144.083 63.2171C144.083 36.0618 120.317 14.0482 91.0001 14.0482C61.6829 14.0482 37.9167 36.0618 37.9167 63.2171C37.9167 72.9596 41.0259 82.0207 46.2963 89.663H46.2357C64.1323 115.617 91.0001 154.531 91.0001 154.531L135.764 89.663H135.711C140.974 82.0207 144.083 72.9596 144.083 63.2171ZM91.0001 84.2895C78.4345 84.2895 68.2501 74.8561 68.2501 63.2171C68.2501 51.5782 78.4345 42.1447 91.0001 42.1447C103.566 42.1447 113.75 51.5782 113.75 63.2171C113.75 74.8561 103.566 84.2895 91.0001 84.2895Z" fill="#276561"/>
                    </svg>
                </p>
                <h4 class="text-center">Lokasi</h4>
                <div class="card-body">
                    <p class="text-center mb-5 text-break" >{{$data->sampah->lokasi}}</p>
                </div>





            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        AOS.init();
    </script>
@endpush
