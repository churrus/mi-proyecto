@extends('layout')

@section('title', "{$title}")

@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo electrónico</th>
        </tr>
        </thead>
        <tbody>

        @forelse($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @empty
            <p>No hay usuarios registrados.</p>
            @endforelse
        </tbody>
    </table>

@endsection

@section('sidebar')
    @parent
    <h2>Barra lateral personalizada</h2>
@endsection
