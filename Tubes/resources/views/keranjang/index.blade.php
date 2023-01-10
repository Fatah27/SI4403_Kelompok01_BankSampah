@extends('layouts.app')
@section('content')
    <div class="container p-5">
        <h1>My Cart</h1>
        <?php $total = 0 ?>

        @foreach ($data as $x)

            <?php $total += ($x->qty * $x->sampah->harga) ?>
        @endforeach
        <form action="{{route('order.make' , ['total' => $total])}}" method="post">
            @csrf
            @method('post')
        <div class="d-flex flex-wrap">
            <?php $total = 0 ?>

        @foreach ($data as $x)
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-header">
                        <div class="form-check d-block mx-auto">
                            <input class="form-check-input" type="checkbox" value="{{$x->id}}" name="tes[]" id="check{{$x->id}}">
                            <label class="form-check-label" for="flexCheckDefault">
                           checkbox
                            </label>
                        </div>
                         <img src="{{asset('/sampah/'.$x->sampah->foto)}}" class="card-img-top h-50" style="min-height: 200px" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$x->sampah->nama}}</h5>
                        <p class="card-text">{{$x->sampah->jenis_sampah}}</p>
                        <div class="text-nowrap" style="">
                            <p class="" style="white-space: nowrap ; width: 200px ; overflow: hidden ; text-overflow:ellipsis;
                            ">{{$x->sampah->deskripsi}}</p>
                        </div>
                        <h3>Rp {{$x->sampah->harga}}</h3>

                        <div class="mt-5">
                            <h5>Quantity</h5>
                            <input type="number" name="qty" class="form-control" value="{{$x->qty}}" disabled>

                            <a href="{{route('keranjang.editdetail' , ['id'=>$x->id])}}" class="btn btn-success w-100 mt-2 d-block mx-auto">Edit Keranjang</a>
                            <a href="{{route('keranjang.delete' , ['id'=>$x->id])}}" class="btn btn-danger w-100 mt-2 d-block mx-auto">Delete Item</a>

                        </div>
                    </div>
                </div>
            <?php $total += ($x->qty * $x->sampah->harga) ?>
        @endforeach

                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="Rp 0" id="total" placeholder="Recipient's username" aria-label="Recipient's username" disabled aria-describedby="basic-addon2">
                    <button class="input-group-text btn btn-success" type="button" id="basic-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal" >Checkout</button>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Isi Data Diri</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group m-2">
                                    <input type="text" name="full_name"  class="form-control" required placeholder="Full Name">
                                </div>

                                <div class="form-group m-2">
                                    <input type="number" name="phone_number"  class="form-control" required placeholder="Phone Number">
                                </div>

                                <div class="form-group m-2">
                                    <input type="text" name="address"  class="form-control" required placeholder="Adress">
                                </div>

                                <h4 class="mt-2 m-2">Shipping</h4>
                                <select class="form-select mt-2 m-2" name="shipping" aria-label="Default select example" required >
                                    <option selected>Pilih Shipping</option>
                                    <option value="Jne">Jne   Rp100.000</option>
                                    <option value="TIKI">Tiki  Rp250.000</option>
                                </select>

                                <h4 class="mt-2 m-2">Shipping</h4>

                                <div class="form-group m-2">
                                    <input type="number" name="credit_card"  class="form-control" required placeholder="Credit Card Number">
                                </div>

                                <div class="form-group d-flex m-2">
                                    <input type="password" name="password"  class="form-control" required placeholder="Password">
                                    <input type="text" name="expired"  class="form-control" required placeholder=" MM/YY">
                                </div>

                                <input type="text" class="form-control m-2" value="Rp 0" id="totals" placeholder="Recipient's username" aria-label="Recipient's username" disabled aria-describedby="basic-addon2">




                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"  >Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
            </form>

        </div>


    </div>


    <div class="container p-5">
        <h1>My Order</h1>
        <div class="d-flex flex-warp">
        @foreach ($order as $x)
            @foreach($x->invoice as $t)
            <div class="card m-2" style="width: 20rem;">
                <div class="card-header h-100 p-3" style="overflow: hidden">
                    <h3>Invoice Number : INV{{$x->id}}</h3>
                    <img src="{{asset('/sampah/'.$t->sampah->foto)}}" class="card-img-top h-100" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nama Pemesan : {{$x->full_name}}</h5>
                    <h5 class="card-title">Nomer Telepon : {{$x->phone_number}}</h5>
                    <h5 class="card-title">alamat : {{$x->address}}</h5>
                    <h5 class="card-title">Shipping : {{$x->shipping}}</h5>
                    <h5 class="card-title">Total Barang : {{$t->total}}</h5>
                </div>
                <div class="card-footer">
                    @if ($t->status == 'dibayar')
                        <a href="" class="btn btn-secondary disabled w-100" disabled>Belum Dikirim</a>
                    @elseif($t->status == 'dikirim')
                        <div class="d-flex">
                        <a href="" class="btn btn-secondary disabled w-100 m-2" disabled>Dikirim</a>
                        <a href="" class="btn btn-outline-success w-100 m-2" data-bs-toggle="modal" data-bs-target="#modal{{$t->id}}">Terima Barang</a>
                        </div>
                    @elseif($t->status == 'diterima')
                        <div class="d-flex">
                            <a href="" class="btn btn-success disabled w-100 m-2" disabled>barang diterima</a>
                        </div>
                    @endif
                </div>

            </div>


                    <div class="modal fade" id="modal{{$t->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Sebutkan Feedback</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('order.terima' , ['id'=>$t->id , 'sampah'=>$t->sampah->id])}}" method="post">
                                    @csrf
                                    @method('post')
                                <div class="modal-body">
                                        <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                                        <textarea class="form-control" name="feedback" id="" cols="30" rows="10" required placeholder="feedback"></textarea>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Complete Payment</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>


            @endforeach
        @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <script>

        var total = 0;
        @foreach ($data as $x)


        $('#check{{$x->id}}').on('click' , function(){
            var $check{{$x->id}}  = $('#check{{$x->id}}').is(':checked');

            if($check{{$x->id}})  {
                total += {{$x->sampah->harga * $x->qty}};
            }else{
                total = total - {{$x->sampah->harga * $x->qty}};
            }


            $('#total').val('Rp ' + total);
            $('#totals').val('Rp ' + total);
        });
            @endforeach
    </script>
    @endpush
