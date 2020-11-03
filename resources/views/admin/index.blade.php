@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">email</th>
                    <th scope="col">joined</th>
                    <th scope="col">role</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->role }}</td>
                    <td class="d-flex">
                        <a href="{{ url('/u/user/' . $user->id) }}" class="btn text-white btn-primary">UPDATE</a>
                        <form method="POST" action="{{ route('deleteuser', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-1">DELETE</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row d-flex justify-content-center">
            {{ $users->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
@endsection