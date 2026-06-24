@extends('layouts.app')

@section('hero')
    <div class="hero">
        <div class="hero-overlay">
            <h1 class="display-4 fw-bold">Membuat Event Kampus Lebih Menarik</h1>
            <p>Kami Membuat Kenangan Yang Tidak Pernah Terlupakan.</p>
            <a href="/services" class="btn btn-warning mt-3">Explore Services</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row text-center">

        <div class="col-md-4">
            <img src="https://cdn-icons-png.flaticon.com/512/1995/1995574.png" width="80">
            <h4>Event Planning</h4>
            <p>Professional campus event planning.</p>
        </div>

        <div class="col-md-4">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" width="80">
            <h4>Creative Team</h4>
            <p>Young creative organizers.</p>
        </div>

        <div class="col-md-4">
            <img src="https://cdn-icons-png.flaticon.com/512/3063/3063823.png" width="80">
            <h4>Best Experience</h4>
            <p>Memorable student events.</p>
        </div>

    </div>
@endsection
