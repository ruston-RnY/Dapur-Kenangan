@extends('layouts.admin')

@section('content')
<!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Produk</h3>
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
                    <form action="{{ route('products.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea rows="10" name="about" class="d-block w-100 form-control">{{ old('about') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" placeholder="price">
                        </div>
                        
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">Cancel</a>
                    </form>     
                </div>
            </div>
        </div>
    </div>
<!-- END MAIN CONTENT -->
@endsection