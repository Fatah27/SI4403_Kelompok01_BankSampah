@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="card-body">
                <h2 class="m-2">Tambah Sampah</h2>
                <form class="mt-5" action="{{route('warehouse.add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group m-2">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Sampah" required>
                    </div>
                    <div class="form-group m-2">
                        <input type="text" class="form-control" name="jenis_sampah" placeholder="Jenis Sampah" required>
                    </div>

                    <div class="form-group m-2">
                        <input type="text" class="form-control" name="lokasi" placeholder="Lokasi" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" name="harga" required placeholder="Harga Jual" aria-label="Amount (to the nearest dollar)">
                    </div>

                    <div class="input-group mb-3 d-flex">
                        <input type="text" class="form-control m-1" name="kota" placeholder="Kota" required>
                        <input type="text" class="form-control m-1" name="provinsi" placeholder="Provinsi" required>
                    </div>

                    <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10" required></textarea>

                    <div class="m-2">
                        <input class="form-control" type="file" id="formFile" name="sampah" placeholder="tambahkan Foto" required>
                    </div>

                    <button class="btn btn-success w-100" type="submit">Submit</button>

                </form>
            </div>
        </div>
    </div>
    @endsection
