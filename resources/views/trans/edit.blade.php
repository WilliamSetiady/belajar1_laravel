@extends('app')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
            </div>
            <div class="card-body">
                <form action="{{route('customer.update', $customer->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Nama customer</label>
                        <input value="{{$customer->name}}" type="text" placeholder="Masukkan Nama customer" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">No.Telepon</label>
                        <input value="{{$customer->phone}}" type="text" placeholder="Masukkan Nomor telepon" class="form-control" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <input value="{{$customer->address}}" type="text" placeholder="Masukkan Deskripsi" class="form-control" name="address">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection