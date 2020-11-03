@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('updateuser', $user->id) }}">
                        @csrf
                        @method('PUT')
                        @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        <div class="form-group">
                            <label for="user_id">ID :</label>
                            <span id="user_id">{{ $user->id }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" value="{{ $user->name }}" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="{{ $user->email }}" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option {{ $user->role == 'admin' ? 'selected' : '' }} value='admin'>Admin</option>
                                <option {{ $user->role == 'moderator' ? 'selected' : '' }} value='moderator'>Moderator</option>
                                <option {{ $user->role == 'user' ? 'selected' : '' }} value='user'>User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection