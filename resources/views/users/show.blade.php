@extends('layout')

@section('title', "Detalle de usuario {$user->id}")

@section('content')

    <h1>Mostrando detalle del usuario: {{ $user->id }}</h1>

    <table class="table table-hover">
        <tbody>
        <tr>
            <th>Nombre</th>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <th>Admin</th>
            <td>{{$user->is_admin}}</td>
        </tr>
        </tbody>
    </table>

    <p>
        <a class="btn btn-outline-primary" href="{{ route('users.index') }}">Regresar</a>
    </p>
@endsection