@extends('app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                    <div class="mb-3" align='right'>
                        <a href="{{route('user.create')}}" class="btn btn-primary">Tambah</a>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th>
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </th>
                            @foreach ($datas as $key => $data)   
                            <tr>
                                <td>{{$key += 1}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                
                                <td>
                                    <a href="{{route('user.edit', $data->id)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('user.destroy', $data->id)}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a href="" class="btn btn-danger m-2" type="submit" onclick="return confirm('yakin mau hapus?')">Delete </a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                           
                       
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
