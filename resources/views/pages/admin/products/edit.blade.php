@extends('layouts.admin')

@section('content')
<!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Edit Produk</h4>
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
                    <form action="{{ route('products.update', $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea rows="10" name="about" class="d-block w-100 form-control">{{ $item->about }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{ $item->price }}" placeholder="price">
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