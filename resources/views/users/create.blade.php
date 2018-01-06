@extends('layout')

@section('title', "Crear usuario")

@section('content')

    <h1>Crear usuario</h1>
    <br>
    <br>

    <form method="POST" action="{{ url('/usuario/crear') }}">

        {{ csrf_field() }}

        <button type="submit">Crear usuario</button>

    </form>
    <br>
    <br>

    <p>
        <a class="btn btn-outline-primary" href="{{ route('users.index') }}">Regresar</a>
    </p>
@endsection