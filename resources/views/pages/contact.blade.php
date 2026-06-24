@extends('layouts.app')

@section('content')
    <h2>Contact Us</h2>

    <div class="row">

        <div class="col-md-6">
            <form>
                <input class="form-control mb-3" placeholder="Name">
                <input class="form-control mb-3" placeholder="Email">
                <textarea class="form-control mb-3" placeholder="Message"></textarea>
                <button class="btn btn-dark">Send Message</button>
            </form>
        </div>

        <div class="col-md-6">
            <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216" class="img-fluid rounded shadow">
        </div>

    </div>
@endsection
