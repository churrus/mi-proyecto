@extends('layout')

@section('title', "{$title}")

@section('content')

     <ul class="list-group">
        @forelse($users as $user)
            <li class="list-group-item">
                {{ $user }}
            </li>
        @empty
             <li class="list-group-item list-group-item-warning">No hay usuarios registrados.</li>
        @endforelse

        <li class="list-group-item list-group-item-success">Hay {{count($users)}} usuarios registrados</li>
    </ul>

@endsection

@section('sidebar')
    @parent
    <h2>Barra lateral personalizada</h2>
@endsection
