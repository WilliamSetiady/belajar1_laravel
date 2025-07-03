@extends('app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf
                        <label for="">Nama User</label>
                        <input type="text" class="form-control" name="name" placeholder="masukkan nama..." required>
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="masukkan email..." required>
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control" placeholder="masukkan password..."></input>

                        <button type="submit" class="btn btn-primary mt-2">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
