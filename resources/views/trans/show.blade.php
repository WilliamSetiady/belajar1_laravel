@extends('app')
@section('content')

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"> Data Pelanggan </h3>
                <table class="table table-stripped">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td> {{$details->customer->name}} </td>
                    </tr>
                    <tr>
                        <td>Telp</td>
                        <td>:</td>
                        <td> {{$details->customer->phone}} </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td> {{$details->customer->address}} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"> Transaksi Pemesanan </h3>
                <table class="table table-stripped">
                    <tr>
                        <td>No.Transaksi</td>
                        <td>:</td>
                        <td> {{$details->order_code}} </td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengambilan</td>
                        <td>:</td>
                        <td> {{date('d F Y', strtotime($details->order_end_date))}} </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td> {{$details->status_text}} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"> Detail Pemesanan </h3>
                <form action="" method="post" id="paymentForm" data-order-id=" {{$details->id}} ">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Paket</th>
                                <th>Qty</th>
                                <th>Harga/Kg</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details->details as $key => $detail) 
                            <tr>
                                <td> {{$key += 1}} </td>
                                <td> {{$detail->service->service_name}} </td>
                                <td align="right">{{$detail->qty}} Kg</td>
                                <td align="right">Rp. {{number_format($detail->service->price)}}</td>
                                <td align="right"> Rp. {{number_format($detail->subtotal)}}</td>
                            </tr>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <td colspan="4"><strong>Total</strong></td>
                                    <td align="right" colspan="1"><strong>Rp. {{number_format($details->total)}} </strong></td>
                                    <input type="hidden" id="totalInput" value=" {{$details->total}} ">
                                </tr>
                                <tr>
                                    <td colspan="4">Bayar</td>
                                    <td colspan="1" class="text-right" align="right">
                                        <input type="number" class="form-control" id="order_pay" name="order_pay" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Kembali</td>
                                    <td colspan="1" class="text-right" align="right">
                                        <input type="text" class="form-control" id="order_change_display" readonly>
                                        <input type="hidden" class="form-control" id="order_change" name="order_change" required>
                                    </td>
                                </tr>
                            </tfoot>
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <button class="btn btn-primary" name="payment_method" value="cash">Bayar Cash</button>
                        <button class="btn btn-success" name="payment_method" value="midTrans">Cashless</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
