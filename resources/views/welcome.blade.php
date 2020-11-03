@extends('layouts.app')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="container">

            @foreach ($posts as $post)
            <div class="row d-flex justify-content-center">
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $post->user->name }}</h6>
                        <p class="card-text">{{ $post->text }}</p>
                        <a href="{{ url('/v/post/' . $post->id) }}" class="card-link">Open post</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row d-flex justify-content-center">
                {{ $posts->links("pagination::bootstrap-4") }}
            </div>
        </div>
    </div>
</div>
@endsection