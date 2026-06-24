@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row align-items-center g-5">

        <div class="col-md-6">
            <img 
                src="{{ asset('image/'.$service->foto) }}" 
                class="img-fluid rounded shadow"
                alt="{{ $service->nama }}"
            >
        </div>

        <div class="col-md-6">

            <h2 class="fw-bold mb-3">
                {{ $service->nama }}
            </h2>

            <p class="text-muted mb-4">
                {{ $service->desc }}
            </p>

            <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">
                ← Back to Services
            </a>

        </div>

    </div>

</div>

<style>
img {
    transition: 0.3s;
}

img:hover {
    transform: scale(1.03);
}
</style>

@endsection