@extends('layouts.admin')

@section('content')
<!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Gambar Produk</h3>
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
                    <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="products_id">Product</label>
                            <select name="products_id" class="form-control" required>
                                <option value="">Pilih Product</option>
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
<!-- END MAIN CONTENT -->
@endsection