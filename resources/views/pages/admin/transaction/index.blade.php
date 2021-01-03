@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Transaksi Dapur Kenangan</h4>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success mt-1 col-4">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">         
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <th>#</th>
                        <th>ID Transaksi</th>
                        <th>Product</th>
                        <th>Username</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse($items as $no => $item)
                            <tr role="row">
                                <td>{{ $no + ($items->firstItem()) }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->username->name }}</td>
                                <td>Rp {{ number_format($item->total_harga) }}</td>
                                <td>{{ $item->transaction_status }}</td>
                                <td>
                                    <a href="{{ route('transaction.show', $item->id) }}" class="btn-sm btn-primary btn-circle"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('transaction.edit', $item->id) }}" class="btn-sm btn-success btn-circle"><i class="fa fa-pencil-alt"></i></a>
                                    <form action="{{ route('transaction.destroy', $item->id) }}" method="post" class="d-inline">       
                                    @method('delete')
                                    @csrf
                                        <button type="submit" class="btn-sm btn-danger btn-circle" onclick="return confirm('apakah anda yakin ?')">
                                        <i class="fas fa-trash"></i>
                                        </button>
                                    </form>                                  
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">
                                    Data Kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    {{ $items->links() }}
                </table>
            </div>
        </div>
    </div>             
</div>
@endsection