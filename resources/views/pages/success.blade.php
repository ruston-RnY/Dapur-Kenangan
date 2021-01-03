@extends('layouts.checkout')

@section('title', 'success')

@section('content')
    <!-- main -->
    <main>
        <div class="section-success align-items-center d-flex">
            <div class="col text-center">
                <img src="{{ url('frontend/images/icon_mail.png') }}" class="item-mail">
                <h1>Yay! Success</h1>
                <p>We've sent you email for trip<br> instruction, please read it as well</p>
                <a href="{{ url('/') }}" class="btn btn-home-page">Home</a>
            </div>
        </div>
    </main>
@endsection