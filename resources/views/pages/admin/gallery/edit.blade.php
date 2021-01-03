@extends('layouts.admin')

@section('content')
<!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Edit Gallery</h4>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('gallery.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="products_id">Product</label>
                            <select name="products_id" class="form-control" required>
                                <option value="{{ $item->products_id }}">Tidak perlu diubah</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">
                                    {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" placeholder="please input your image">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <a href="{{ route('gallery.index') }}" class="btn btn-sm btn-primary">Cancel</a>
                    </form>   
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Gambar Produk</h3>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="panel-body">
            <form action="{{ route('gallery.update', $item->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="products_id">Product</label>
                    <select name="products_id" class="form-control" required>
                        <option value="{{ $item->products_id }}">Tidak perlu diubah</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                            {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" placeholder="please input your image">
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                <a href="{{ route('gallery.index') }}" class="btn btn-sm btn-primary">Cancel</a>
            </form>     
        </div>
    </div> --}}
<!-- END MAIN CONTENT -->
@endsection