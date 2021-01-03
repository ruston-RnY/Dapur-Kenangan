@extends('layouts.checkout')

@section('title', 'checkout')

@section('content')
    <!-- Main -->
    <section class="section-checkout">
        <div class="container">
            <div class="row">
                <div class="col section-detail-header">
                    <h2>Product / Details / <span>Checkout</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <div class="card card-detail shadow">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="">
                            <h3 class="text-center"><i class="fa fa-shopping-cart"></i> Order Detail</h3>
                                                           
                            <table class="detail-order table">                            
                                <thead>
                                    <th>Nama Makanan</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </thead>
                                @if (!empty($item))
                                <tbody>
                                    @forelse ($item->detail as $detail)   
                                    <tr>
                                        <td>{{ $detail->products_name }}</td>
                                        <td>{{ $detail->jumlah_pesan }}</td>
                                        <td>{{ $detail->keterangan }}</td>
                                        <td>Rp {{ number_format($detail->jumlah_harga) }}</td>
                                        <td>
                                            <form action="{{ route('checkout_remove', $detail->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('yakin gak jadi beli ??')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                            <tr>
                                                <th class="text-center text-muted" colspan="5">
                                                    Keranjang anda kosong, yuk di isi  !!...
                                                </th>
                                            </tr>
                                    @endforelse
                                    <tr>
                                        <th colspan="3">Total + (unique code)</th>
                                        <td>
                                            <span class="text-primary" style="font-weight: bold;">Rp {{ number_format($item->total_harga) }},</span>
                                            <span class="text-warning" style="font-weight: bold;">{{ mt_rand(0,99) }}</span + (unique code)an>
                                        </td>
                                    </tr>
                                </tbody>
                                @endif    
                            </table>
                            
                            
                                
                            <div class="row">
                              <a href="{{ route('checkout_success') }}" class="btn btn-add-now mr-3 ml-3">Pay Now</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row item-recommend p-4">
                <div class="row">
                    <div class="col">
                        <h2>Maybe you like ?</h2>
                    </div>
                </div>
                <div class="row pr-2 pl-2">
                    <div class="col-lg-3 col-md-6">
                        <img src="frontend/images/pic.jpg" alt="" class="img-fluid mb-3">
                        <a href="" class="btn btn-see-more btn-center">See More</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <img src="frontend/images/pic-2.jpg" alt="" class="img-fluid mb-3">
                        <a href="" class="btn btn-see-more btn-center">See More</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <img src="frontend/images/pic.jpg" alt="" class="img-fluid mb-3">
                        <a href="" class="btn btn-see-more btn-center">See More</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3>Featured Item</h3>
                        <p>Karakteristik yang pertama bahwa masing-masing organisasi memiliki tujuan-tujuan tertentu. Secara umum tujuan organisasi adalah mencapai tingkat keuntungan, dan mengejar pertumbuhan.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
