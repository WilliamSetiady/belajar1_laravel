@extends('app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                    <form action="{{route('trans.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="" class="form-label">No.Pesanan</label>
                                <input type="text" class="form-control" name="order_code" readonly value="{{$orderCode ?? ''}}">
                            <div class="mt-3 mb-3">
                                <label for="">Nama Pelanggan</label>
                                <select class="form-control" name="id_customer" >
                                    <option value="">Pilih Pelanggan</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="">Paket</label>
                                <select class="form-control" id="id_service" >
                                    <option value="">Pilih Paket</option>
                                    @foreach ($services as $service)
                                        <option data-price="{{$service->price}}" value="{{$service->id}}">{{$service->service_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-3 mb-3">
                                <label for="" class="form-label">Waktu Pengambilan</label>
                                <input type="date" name="order_end_date" class="form-control">
                            </div>

                            <div class="">
                                <label for="">Catatan</label>
                                <textarea name="note" id="" cols="30" rows="5" class="form-control" placeholder="masukkan catatan..."></textarea>
                            </div>
                            </div>
                        </div>

                        <div class="mt-3 mb-3">
                            <div align='right' class="mb-3">
                                <button type="button" class="btn btn-primary addRow">Tambah Row</button>
                            </div>
                            <table class="table table-bordered" id="tableL">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Paket</th>
                                        <th>Qty</th>
                                        <th>SubTotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                            <p><strong>Grand Total: Rp. <span id="grandTotal"></span></strong></p>
                    <input type="hidden" name="total" id="grandTotalInput" value="0">
                        </div>
                        

                        <button type="submit" class="btn btn-primary mt-2">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
