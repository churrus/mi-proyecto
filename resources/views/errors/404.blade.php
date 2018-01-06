@extends('layout')

@section('title', "Página no encontrada")

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h1>
                        Oops!</h1>
                    <h2>
                        404 Página no encontrada</h2>
                    <div class="error-details">
                        Ha ocurrido un error y no se ha encontrado la página.
                    </div>
                    <br />
                    <br />
                    <div class="error-actions">
                        <a href="{{ url('/') }}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                            Ir al Home </a>
                        <a href="https://styde.net/" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Ir a Styde.net </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('sidebar')
    @parent
    <h2>Barra lateral personalizada</h2>
@endsection
