@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8  m-3">
                <div class="row border">
                    <div class="col-5 p-5" data-aos="fade-up"
                         data-aos-anchor-placement="top-bottom">
                        <img src="{{asset('/sampah/'.$data->foto)}}" class="w-100" style="margin-top: 100px" alt="">
                    </div>
                    <div class="col p-5">
                        <h3>{{$data->nama}}</h3>
                        <h1>Rp. {{$data->harga}}</h1>
                        <h5>Deskripsi</h5>
                        <p>{{$data->deskripsi}}</p>
                        <form action="{{route('keranjang.post' , ['id'=>$data->id])}}" method="post">
                            @csrf
                            @method('post')
                            <div class="mt-5">
                                <h5>Quantity</h5>
                                <input type="number" name="qty" class="form-control" value="1">

                                <button type="submit" class="btn @if(\Illuminate\Support\Facades\Auth::id() == $data->user_id) disabled @endif btn-success w-100 mt-2 d-block mx-auto">Masukan Ke keranjang</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row border mt-3 p-5">
                    <h1>Feedback</h1>
                    @foreach($feedback as $f)
                        <div class="card p-5">
                            <h3>Nama : {{$f->name}}</h3>
                            <p>Feedback : {{$f->feedback}}</p>
                        </div>
                    @endforeach
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
                    <p class="text-center mb-5 text-break" >{{$data->lokasi}}</p>
                </div>





            </div>
        </div>
    </div>

    <a href="{{route('keranjang.detail')}}" id="fixedbutton" class="btn bgs">
        <svg width="30" height="63" viewBox="0 0 61 63" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30.3946 24.505H36.2846V15.67H45.1196V9.78008H36.2846V0.945129H30.3946V9.78008H21.5597V15.67H30.3946V24.505ZM18.6147 51.0098C15.3752 51.0098 12.7542 53.6603 12.7542 56.8998C12.7542 60.1393 15.3752 62.7898 18.6147 62.7898C21.8542 62.7898 24.5047 60.1393 24.5047 56.8998C24.5047 53.6603 21.8542 51.0098 18.6147 51.0098ZM48.0645 51.0098C44.8251 51.0098 42.204 53.6603 42.204 56.8998C42.204 60.1393 44.8251 62.7898 48.0645 62.7898C51.304 62.7898 53.9545 60.1393 53.9545 56.8998C53.9545 53.6603 51.304 51.0098 48.0645 51.0098ZM21.8542 36.2849H43.7943C46.0031 36.2849 47.9467 35.0775 48.948 33.2516L60.3157 12.6073L55.162 9.78008L43.7943 30.395H23.1205L10.5749 3.89011H0.944824V9.78008H6.83479L17.4367 32.1325L13.461 39.3183C11.3112 43.2645 14.1383 48.0648 18.6147 48.0648H53.9545V42.1749H18.6147L21.8542 36.2849Z" fill="white"/>
        </svg>
    </a>
@endsection

@push('scripts')
    <script>
        AOS.init();
    </script>
    @endpush
