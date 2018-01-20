@extends('layout')

@section('title', "Editar usuario")

@section('content')

    <div class="card" >
        <div class="card-header  text-primary">
            <div class="card-title">Editar usuario</div>
        </div>

        {{--@if ($errors->any())--}}
        {{--<div class="alert alert-danger mx-4">--}}
        {{--<h6>Por favor corrige los siguientes errores:</h6>--}}
        {{--<ul>--}}
        {{--@foreach($errors->all() as $error)--}}
        {{--<li>{{ $error }}</li>--}}
        {{--@endforeach--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--@endif--}}

        <div class="card-body mx-4">

            <form method="POST" action="{{ url('/usuarios') }}" novalidate>

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}" placeholder="Paco" required>
                </div>

                @if($errors->has('name'))
                    <div class="alert alert-danger">
                        <p>{{ $errors->first('name') }}</p>
                    </div>
                @endif


                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}">
                </div>

                @if($errors->has('email'))
                    <div class="alert alert-danger">
                        <p>{{ $errors->first('email') }}</p>
                    </div>
                @endif

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>

                @if($errors->has('password'))
                    <div class="alert alert-danger">
                        <p>{{ $errors->first('password') }}</p>
                    </div>
                @endif

                <hr>
                <button type="submit" class="btn btn-outline-primary">Actualizar usuario</button>
                <a class="btn btn-outline-primary" href="{{ route('users.index') }}">Regresar</a>
            </form>
        </div>
    </div>

@endsection