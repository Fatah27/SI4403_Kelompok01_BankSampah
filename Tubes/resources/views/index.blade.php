@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="fw-bold font-monospace" style="margin-top: 150px">SELAMAT DATANG DI <br> BANK SAMPAH!</h1>

                <p class="mt-2">
                    Ubah barang tidak terpakai menjadi sesuatu yang lebih berharga
                </p>
            </div>
            <div class="col-6">
                <img class="img-fluid w-50 d-block mx-auto mb-5 mt-5" src="{{asset('/image/img_1.png')}}" alt="">
            </div>
        </div>

        <div class="mt-5">
            <h3 class="fw-bold text-center">FEATURE</h3>
            <div class="d-flex mt-2">
                <div class="">
                    <img class="img-fluid w-50 d-block mx-auto mb-5 mt-5" src="{{asset('/image/fitur1.png')}}" alt="">
                    <h3 class="text-center">Shop</h3>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur assumenda consectetur quia. <br> Temporibus delectus sit nostrum. Ipsam.</p>
                </div>

                <div class="">
                    <img class="img-fluid w-50 d-block mx-auto mb-5 mt-5" src="{{asset('/image/fitur2.png')}}" alt="">
                    <h3 class="text-center">Transaksi</h3>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur assumenda consectetur quia. <br> Temporibus delectus sit nostrum. Ipsam.</p>
                </div>

                <div class="">
                    <img class="img-fluid w-50 d-block mx-auto mb-5 mt-5" src="{{asset('/image/fitur3.png')}}" alt="">
                    <h3 class="text-center">Warehouse</h3>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur assumenda consectetur quia. <br> Temporibus delectus sit nostrum. Ipsam.</p>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h3 class="fw-bold text-center">ABOUT</h3>
            <div class="d-flex mt-5">
                <div class="">
                    <h3 class="text-center">Lorem ipsum dolor sit amet consectetur assumenda consectetur quia. <br> Temporibus delectus sit nostrum. Ipsam.</h3>
                </div>

                <div class="">
                    <h3 class="text-center">Lorem ipsum dolor sit amet consectetur assumenda consectetur quia. <br> Temporibus delectus sit nostrum. Ipsam.</h3>
                </div>

            </div>
        </div>
    </div>

@endsection
