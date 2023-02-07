@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Witaj!</h2>

            @if (Auth::check())
            <a class="btn btn-success" href="/users">Users</a>
            @endif
        </div>
    </div>
</div>
@endsection
