@extends('app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                    <div class="mb-3" align='right'>
                        <a href="{{route('trans.create')}}" class="btn btn-primary">Tambah</a>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th>
                                <tr>
                                    <th>No</th>
                                    <th>No. Pesanan</th>
                                    <th>Pelanggan</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </th>
                            @foreach ($datas as $key => $data)   
                            <tr>
                                <td>{{$key += 1}}</td>
                                <td>
                                    <a href="{{route('trans.show', $data->id)}}">{{$data->order_code}}</a>
                                </td>
                                <td>{{$data->customer->name}}</td>
                                <td>{{$data->order_end_date}}</td>
                                <td>{{$data->status_text}}</td>
                                <td>
                                    <a href="{{route('print_struk', $data->id)}}" class="btn btn-info">Print</a>
                                    <a href="{{route('trans.show', $data->id)}}" class="btn btn-success">Tampilkan</a>
                                    <form action="{{route('trans.destroy', $data->id)}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-2" type="submit" onclick="return confirm('yakin mau hapus?')">Delete </button>
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
