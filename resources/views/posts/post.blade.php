@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {{ $post->user->name }}
                    <hr>
                    {{ $post->title }}
                    <hr>
                    {{ $post->text }}
                    <hr>
                    <div class="d-flex">
                        @if(!Auth::guest())
                            @if (Auth::id() == $post->user_id || Auth::user()->role == 'admin')
                                <form method="POST" action="{{ route('deletepost', $post->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger m-1">DELETE</button>
                                <a href="{{ url('/u/post/' . $post->id)}}" class="btn btn-primary m-1">UPDATE</a>
                                </form>
                            @endif
                            @if (Auth::user()->role == 'moderator' && Auth::id() != $post->user_id)
                                <a href="{{ url('/u/post/' . $post->id)}}" class="btn btn-primary m-1">UPDATE</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection