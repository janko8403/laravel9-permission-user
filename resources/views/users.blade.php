@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    {{ __('Users') }}

                    @if(Auth::user()->hasRole('Admin'))
                        <a class="btn btn-success" href="/add">Add</a>
                    @endif
                </div>

                <div class="card-body">
                    
                    <div class="table-responsive">

                        @if (count($users) == 0)

                            <div class="alert alert-danger" role="alert">
                                No Users
                            </div>

                        @else
                            <table class="table table-hover">
                                <thead class="">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Imię
                                    </th>
                                    <th>
                                        Nazwisko
                                    </th>
                                    <th>
                                        E-mail
                                    </th>
                                    <th>
                                        Rola
                                    </th>
                                     <th class="text-center">
                                        Akcja
                                    </th>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)

                                        <tr>
                                            <td>
                                                {{ $user->id }}
                                            </td>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->surname }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ $user->roles[0]->name }}
                                            </td>
                                            <td class="td-actions text-center d-flex justify-content-center">

                                            @php
                                            
                                            @endphp

                                                @if (Auth::check() && Auth::user()->hasRole('Admin'))
                                                    <a class="btn btn-info btn-sm me-2" href="/edit/{{ $user->id }}">Edit</a>
                                                    
                                                    @if (Auth::id() !== $user->id)
                                                        <button
                                                            type="button"
                                                            title="Usuń" class="btn btn-danger btn-sm"
                                                            onclick="event.preventDefault();
                                                                document.getElementById('delete-{{ $user->id }}').submit();">
                                                            Delete
                                                        </button>

                                                        <form id="delete-{{ $user->id }}"
                                                            action="{{ url('delete/' . $user->id) }}"
                                                            method="POST"
                                                            style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                            
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
