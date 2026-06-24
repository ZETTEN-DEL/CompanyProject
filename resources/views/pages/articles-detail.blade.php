@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow border-0">

                <img 
                src="{{ asset('image/'.$article->foto) }}" 
                class="img-fluid rounded shadow"
                alt="{{ $article->nama }}"
            >

                <div class="card-body p-4">

                    <h2 class="fw-bold mb-3">
                        {{ $article->title }}
                    </h2>

                    <p class="text-muted mb-2">
                        Author: {{ $article->author }}
                    </p>

                    <p class="text-muted mb-4">
                        Publish Date: {{ $article->publish_date }}
                    </p>

                    <hr>

                    <p style="line-height:1.8;">
                        {{ $article->content }}
                    </p>

                    <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary mt-4">
                        ← Back to Articles
                    </a>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection