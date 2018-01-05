@extends('layout')

@section('title', "Detalle de usuario {$id}")

@section('content')

    <h1>Mostrando detalle del usuario: {{ $id }}</h1>

    <table class="table table-hover">
        <tbody>
        <tr>
            <th>Nombre</th>
            <td>Sergio</td>
        </tr>
        <tr>
            <th>Apellido</th>
            <td>Torquemada</td>
        </tr>
        <tr>
            <th>Dirección</th>
            <td>Itxaropen auzoa 13 </td>
        </tr>
        </tbody>
    </table>
@endsection