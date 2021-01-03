@extends('layouts.admin')

@section('content')
<!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary mb-3">Gallery Dapur Kenangan</h4>
                    <a href="{{ route('gallery.create') }}" class="btn btn-sm btn-primary">Tambah Gambar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success mt-1 col-4">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <th>#</th>
                                <th>Product</th>
                                <th>Image</th>                                          
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse($items as $no => $item)
                                    <tr>
                                        <td>{{ $no + ($items->firstItem()) }}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>
                                            <img src="{{ Storage::url($item->image) }}" width="150px" class="img-thumbnail">
                                        </td>
                                        <td>
                                            <a href="{{ route('gallery.edit', $item->id) }}" class="btn-sm btn-success btn-circle"><i class="fa fa-pencil-alt"></i></a>
                                            <form action="{{ route('gallery.destroy', $item->id) }}" method="post" class="d-inline">       
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
                                        <td class="text-center" colspan="4">
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

    <!-- table -->
    {{-- <div class="card-header">
        <div class="panel-heading">
            <h3 class="text-bold">Gallery</h3>
            <a href="{{ route('gallery.create') }}" class="btn btn-sm btn-primary">Tambah Gambar</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="dt-bootstrap4 dataTables-wrapper" id="dataTable-wrapper">
                    <table class="table table-bordered dataTable" id="dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Image</th>                                          
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>
                                        <img src="{{ Storage::url($item->image) }}" width="150px" class="img-thumbnail">
                                    </td>
                                    <td>
                                        <a href="{{ route('gallery.edit', $item->id) }}" class="btn-sm btn-success btn-circle"><i class="fa fa-pencil-alt"></i></a>
                                        <form action="{{ route('gallery.destroy', $item->id) }}" method="post" class="d-inline">       
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
                                    <td class="text-center" colspan="4">
                                        Data Kosong
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- end table -->
<!-- END MAIN CONTENT -->
@endsection