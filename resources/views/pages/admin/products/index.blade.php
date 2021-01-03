@extends('layouts.admin')

@section('content')
<!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary mb-3">Data Produk Dapur Kenangan</h4>
                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary mb-4">Tambah Data</a>
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
                                <th>ID Product</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>About</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse($items as $no => $item)
                                    <tr>
                                        <td>{{ $no + ($items->firstItem()) }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>Rp {{ number_format($item->price) }}</td>
                                        <td>{{ $item->about }}</td>
                                        <td>
                                            <a href="{{ route('products.edit', $item->id) }}" class="btn-sm btn-success btn-circle"><i class="fa fa-pencil-alt"></i></a>
                                            <form action="{{ route('products.destroy', $item->id) }}" method="post" class="d-inline">       
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
                                        <td class="text-center">
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
    </div>
<!-- END MAIN CONTENT -->
@endsection