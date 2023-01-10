@extends('layouts.app')
@section('content')
    <div class="container p-5">
        <div class="card p-3">
            <h1>Update Profile</h1>

            <form action="{{route('update')}}" method="post">
                @csrf
                @method('post')
                <div class="form-group m-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                </div>

                <div class="form-group m-3">
                    <label for="">Email</label>
                    <input type="email" name="tes" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                </div>

                <div class="form-group m-3">
                    <button type="submit" name="email" class="btn btn-success w-100 "> Submit</button>
                </div>


            </form>
        </div>
    </div>
@endsection
