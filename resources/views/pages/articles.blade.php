@extends('layouts.app')

@section('content')
    <h2 class="text-center mb-4">Latest Articles</h2>

    <div class="row">

        @foreach ($articles as $article)
            <div class="col-md-4">
                <div class="card shadow mb-4">

                    <img src="{{ asset('image/' . $article->foto) }}" class="card-img-top service-img"
                            alt="{{ $article->nama }}">

                    <div class="card-body">
                        <h5>{{ $article->title }}</h5>
                        <p>{{ Str::limit($article->content, 100) }}</p>
                        <small>Author: {{ $article->author }}</small>

                        <br><br>

                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary btn-sm">
                            Read More
                        </a>
                    </div>

                </div>
            </div>
        @endforeach

    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $articles->links('pagination::bootstrap-5') }}
    </div>
@endsection
