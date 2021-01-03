@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Detail Transaksi</h1>
    <a href="{{ route('transaction.index') }}" class="btn btn-sm btn-primary mb-4">Kembali</a>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Detail Transaksi Dapur Kenangan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">         
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 159px;">ID</th>
                        <td>{{ $item->id }}</td>
                    </tr>    
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 159px;">Product</th>
                        <td>{{ $item->product->name }}</td>
                    </tr>    
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 159px;">Pembeli</th>
                        <td>{{ $item->username->name }}</td>
                    </tr>    
                    @foreach ($item->detail as $detail)
                        <tr>
                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 159px;">Keterangan</th>
                            <td>{{ $detail->keterangan }}</td>
                        </tr>
                        <tr>
                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 159px;">Jumlah Pesan</th>
                            <td>{{ $detail->jumlah_pesan }} porsi</td>
                        </tr>
                    @endforeach  
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 159px;">Total Transaksi</th>
                        <td>Rp. {{ number_format($item->total_harga) }}</td>
                    </tr> 
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 159px;">Status Transaksi</th>
                        <td>{{ $item->transaction_status }}</td>
                    </tr>  
                </table>
            </div>
        </div>
        
    </div>             
</div>
@endsection