@extends('layouts.app')

@section('title', 'Dapur Kenangan')

@section('content')
    <header class="text-center">
        <h1>Your Memories of your favorite<br> childhood foods</h1>
        <p>Get food that makes you happy</p>
    </header>
    <!-- Section Info -->
    <section class="section-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 catering-description">
                    <h3>Catering</h3>
                    <hr>
                    <p>Karakteristik yang pertama bahwa masing-masing organisasi memiliki tujuan-tujuan tertentu. Secara umum tujuan organisasi adalah mencapai tingkat keuntungan, dan mengejar pertumbuhan.</p>
                </div>
                <div class="col-lg-4 col-md-5 card-catering">
                    <img src="{{ url('frontend/images/pic.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-4 col-md-5 card-catering">
                    <img src="{{ url('frontend/images/pic-2.jpg') }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row justify-content-center">
                <h1>Our Services</h1>
            </div>
        </div>
    </section>

    <!-- Info Panel -->
    <section class="info-panel">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 info-panel-content">
                    <div class="row">
                        <div class="col-lg ">
                            <img src="{{ url('frontend/images/delivery-man.png') }}" alt="" class="service-icon float-left ">
                            <h4 class="info-panel-desc ">Free Delivery</h4>
                        </div>
                        <div class="col-lg ">
                            <img src="{{ url('frontend/images/food.png') }}" alt="" class="service-icon float-left">
                            <h4 class="info-panel-desc ">Higienis Foods</h4>
                        </div>
                        <div class="col-lg">
                            <img src="{{ url('frontend/images/customer-support.png') }}" alt="" class="service-icon float-left">
                            <h4 class="info-panel-desc ">24 Hours Open</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- product -->
    <section class="best-product">
        <div class="container">
            <h1>Best of the day</h1>
            <div class="row best-info-content ">
                @foreach ($items as $item)
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card card-product">
                        <div class="inner">
                            <img src="{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}" class="card-img-top " alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">Rp. {{ number_format($item->price) }} </p>
                            <a href="{{ route('detail', $item->slug) }}" class="btn btn-see-more">See more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- why us -->
    <section class="why-us">
        <div class="container">
            <div class="row heading-info text-center justify-content-center">
                <div class="col">
                    <h1>Why Us</h1>
                    <p>you will fill like in your home and enjoy</p>
                </div>
            </div>
            <div class="row why-us-content mt-5">
                <div class="col-lg-4">
                    <div class="row ml-1">
                        <img src="{{ url('frontend/images/agreement.png') }}" alt="" class="img-why-us float-left">
                        <p class="why-us-text">Experience<br> In Culinary</p>
                    </div>
                    <div class="row">
                        <div class="col why-us-description">
                            <p>Karakteristik yang pertama bahwa masing-masing organisasi memiliki tujuan-tujuan tertentu. Secara umum tujuan organisasi adalah mencapai tingkat keuntungan, dan mengejar pertumbuhan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row m-1">
                        <img src="{{ url('frontend/images/certified.png') }}" alt="" class="img-why-us float-left">
                        <p class="why-us-text">Halal <br>Certified</p>
                    </div>
                    <div class="row">
                        <div class="col why-us-description">
                            <p>Karakteristik yang pertama bahwa masing-masing organisasi memiliki tujuan-tujuan tertentu. Secara umum tujuan organisasi adalah mencapai tingkat keuntungan, dan mengejar pertumbuhan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row m-1">
                        <img src="{{ url('frontend/images/business.png') }}" alt="" class="img-why-us float-left">
                        <p class="why-us-text">Friendly <br> Services</p>
                    </div>
                    <div class="row">
                        <div class="col why-us-description">
                            <p>Karakteristik yang pertama bahwa masing-masing organisasi memiliki tujuan-tujuan tertentu. Secara umum tujuan organisasi adalah mencapai tingkat keuntungan, dan mengejar pertumbuhan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- testimonial -->
    <section class="testimonial">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col">
                    <h1>Hear Our Customers Say</h1>
                    <p>Some quick example text to build on</p>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col testi-content">
                    <p>" Makanannya enak dan harganya terjangkau, ayam bakar madunya ngangenin"</p>
                </div>
            </div>
            <div class="row justify-content-center text-center testi-people">
                <div class="col">
                    <figure class="figure">
                        <img src="{{ url('frontend/images/toni.jpg') }}" class="figure-img img-fluid rounded-circle img-testi" alt="...">
                        <figcaption class="figure-caption testi-name">Ruston Efendi</figcaption>
                        <p class="testi-status">Mahasiswa</p>
                    </figure>
                </div>
            </div>
        </div>
    </section>
@endsection