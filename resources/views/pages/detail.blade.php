@extends('layouts.app')

@section('title', 'details')

@section('content')
    <!-- Main -->
    <section class="section-detail pb-4">
        <div class="container">
            <div class="row">
                <div class="col section-detail-header">
                    <h2>Product / <span>Details</span> </h2>
                </div>
            </div>

            <div class="card card-detail">
                <div class="row">
                    <div class="col-lg-7">
                        <h2>{{ $item->name }}</h2>
                        @if ($item->galleries->count() > 0)
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img src="{{ Storage::url($item->galleries->first()->image) }}" class="xzoom" id="xzoom-default" xoriginal="{{ Storage::url($item->galleries->first()->image) }}">
                                </div>
                                <div class="xzoom-thumbs">
                                    @foreach ($item->galleries as $gallery)
                                        <a href="{{ Storage::url($gallery->image) }}">
                                            <img src="{{ Storage::url($gallery->image) }}" class="xzoom-gallery" width="115" xpreview="{{ Storage::url($gallery->image) }}">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <h2>Informations</h2><hr>
                        <div class="row mb-3">
                            <div class="col">
                                <h4>Rp {{ number_format($item->price) }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>{{ $item->about }}</p>
                            </div>
                        </div>
                        
                        <table class="product-informations mt-3 ">
                            <form action="{{ route('checkout_process', $item->id) }}" method="post">
                                @csrf
                                <tr>
                                    <th >Jumlah</th>
                                    <td  class="text-right" >
                                        <input type="number" name="jumlah_pesan" class="mt-3">
                                    </td>
                                </tr>
                                <tr class="mt-3">
                                    <th width="50%">Keterangan</th>
                                    <td width="50%" class="text-right">
                                        <textarea name="keterangan" cols="20" rows="2" class="mt-3" placeholder="cth : pedas"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        @auth
                                            <button class="btn btn-order-now mt-3" type="submit">Order Now</button>
                                        @endauth
    
                                        @guest
                                            <a href="{{ route('login') }}" class="btn btn-order-now mt-3">Login</a>
                                        @endguest
                                    </td>
                                </tr>
                            </form>
                        </table>
                        
                        <div class="add-varian">
                            <h5 class="mt-5 mb-0">Note</h5>
                            <p class="text-muted noted"><i>If you don't choose, we will send randomly</i></p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- akhir main -->
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                Xoffset: 15
            });
        });
    </script>
@endpush