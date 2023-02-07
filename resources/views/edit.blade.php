@extends('layouts.app')

@section('title')
    Edit user
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    {{ __('Edit users') }}
                    <a class="btn btn-info" href="/users">Back</a>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ url('update/' . $user->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-12 pt-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Surname</label>
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $user->surname }}">

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            @if (Auth::id() !== $user->id)
                                <div class="col-md-12 pt-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Roles</label>
                                        <select class="form-control" name="role">
                                            @foreach ($roles as $role)
                                                <option @if($role->id == $user->roles[0]->id) {{ 'selected' }} @endif
                                                    value="{{ $role->id }}">
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary pull-left">Edit user</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
