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

<script>
    const button = document.querySelector('.addRow');
    const tbody = document.querySelector('#tableL tbody');
    const select = document.querySelector('#id_service');
    // const selectN = document.querySelector('#notes');

    const grandTotal = document.getElementById('grandTotal');
    const grandTotalInput = document.getElementById('grandTotalInput');
    // const orderChange = document.getElementById('order_change');
    // const orderChangeDisplay = document.getElementById('order_change_display');
    // const orderPay = document.getElementById('order_pay');

   

    

    let no = 1;
    button.addEventListener("click", function() {
        const selectedservice = select.options[select.selectedIndex];
        const serviceValue = selectedservice.value;
        // const noteValue = selectN.value;

        if (!serviceValue) {
            alert("Please select a service first!!");
            return;
        }
        const serviceName = selectedservice.textContent;
        const servicePrice = selectedservice.dataset.price;

        const tr = document.createElement("tr");
        tr.innerHTML = `
        <td>${no}</td>
        <td><input type='hidden' name='id_service[]' value='${serviceValue}'  class='id_services'>${serviceName}</td>
        <td>
        <input type='number' value='1' step='any' min='0' name='qty[]' class='qtys'>
        <input type='hidden' class='priceInput' value='${servicePrice}' name='price[]'>
        </td>
        <td><input type='hidden'  class='totals' name='subtotal[]' value='${servicePrice}'><span class='totalText'>${servicePrice}</span></td>
        <td><button class='btn btn-success btn-sm removeRow'>Delete</button></td>
        `;

        tbody.appendChild(tr);
        no++;

        select.value = "";
        updateGrandTotal();
    });

    tbody.addEventListener('click', function(e) {
        if (e.target.classList.contains('removeRow')) {
            e.target.closest("tr").remove();
        }
        updateNumber();
        updateGrandTotal();
    });

    tbody.addEventListener('input', function(e) {
        if (e.target.classList.contains('qtys')) {
            const row = e.target.closest("tr");
            const qty = parseFloat(e.target.value) || 0;
            const price = parseInt(row.querySelector('.priceInput').value);

            row.querySelector('.totalText').textContent = price * qty;
            row.querySelector('.totals').value = price * qty;

            updateGrandTotal();
        }
    });

    function updateNumber() {
        const rows = tbody.querySelectorAll("tr");
        rows.forEach(function(row, index) {
            row.cells[0].textContent = index + 1;
        });

        no = rows.length + 1;
    }

    function updateGrandTotal() {
        const totalCells = tbody.querySelectorAll('.totals');
        let grand = 0;
        totalCells.forEach(function(input) {
            grand += parseInt(input.value) || 0;
        });
        grandTotal.textContent = grand.toLocaleString('id-ID');
        grandTotalInput.value = grand;

    }

</script>

@endsection
