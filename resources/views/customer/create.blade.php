@extends('app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                    <form action="{{route('customer.store')}}" method="POST">
                        @csrf
                        <label for="">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="name" required>
                        <label for="">No.Telepon</label>
                        <input type="Number" class="form-control" name="phone">
                        <label for="">Alamat</label>
                        <textarea name="address" id="" cols="30" rows="5" class="form-control" placeholder="masukkan tempat tinggal..."></textarea>

                        <button type="submit" class="btn btn-primary mt-2">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
