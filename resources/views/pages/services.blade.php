@extends('layouts.app')

@section('content')
    <style>
        .service-card {
            transition: 0.3s;
            border-radius: 15px;
            overflow: hidden;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .service-img {
            height: 200px;
            object-fit: cover;
            transition: 0.3s;
        }

        .service-card:hover .service-img {
            transform: scale(1.05);
        }
    </style>
    <div class="container py-5">

        <!-- TITLE -->
        <h2 class="text-center fw-bold mb-5">
            Our Services
        </h2>

        <div class="row g-4">

            @foreach ($services as $service)
                <div class="col-md-3 col-sm-6">

                    <div class="card service-card h-100 shadow-sm border-0">

                        <img src="{{ asset('image/' . $service->foto) }}" class="card-img-top service-img"
                            alt="{{ $service->nama }}">

                        <div class="card-body text-center">

                            <h5 class="fw-bold">
                                {{ $service->nama }}
                            </h5>

                            <p class="text-muted small">
                                {{ $service->desc }}
                            </p>

                            <a href="{{ route('services.show', $service->id) }}" class="btn btn-warning btn-sm mt-2">
                                Learn More
                            </a>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $services->links('pagination::bootstrap-5') }}
    </div>
@endsection
