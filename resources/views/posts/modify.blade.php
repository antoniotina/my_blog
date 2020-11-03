@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('updatepost', $post->id) }}">
                        @csrf
                        @method('PUT')
                        @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" value="{{ $post->title }}" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter title">
                            <small id="titlehelp" class="form-text text-muted">Make it something interesting !</small>
                        </div>
                        <div class="form-group">
                            <label for="posttext">Text</label>
                            <textarea class="form-control" id="posttext" name="posttext" rows="3" placeholder="Enter text">{{ $post->text }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection