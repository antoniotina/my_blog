@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (!Auth::guest())
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                        {{ __('You are logged in!') }}
                    </div>
                    @else
                        {{ __('You are not logged in!') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection