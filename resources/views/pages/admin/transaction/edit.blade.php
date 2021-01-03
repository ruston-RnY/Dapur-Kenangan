@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Edit Status Transaksi</h4>
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
            <form action="{{ route('transaction.update', $item->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="transaction_status">Status</label>
                    <select name="transaction_status" class="form-control" required>
                        <option value="{{ $item->transaction_status }}">
                            Ubah Status ({{ $item->transaction_status }})
                        </option>
                        <option value="IN_CART">In Cart</option>
                        <option value="FAILED">Failed</option>
                        <option value="PENDING">Pending</option>
                        <option value="SUCCESS">Sucess</option>
                        <option value="CANCEL">Cancel</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                <a href="{{ route('transaction.index') }}" class="btn btn-sm btn-primary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection