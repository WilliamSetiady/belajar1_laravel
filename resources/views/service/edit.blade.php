@extends('app')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
            </div>
            <div class="card-body">
                <form action="{{route('service.update', $service->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Nama service</label>
                        <input value="{{$service->service_name}}" type="text" placeholder="Masukkan Nama service" class="form-control" name="service_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama service</label>
                        <input value="{{$service->price}}" type="text" placeholder="Masukkan Harga" class="form-control" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama service</label>
                        <input value="{{$service->description}}" type="text" placeholder="Masukkan Deskripsi" class="form-control" name="description">
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