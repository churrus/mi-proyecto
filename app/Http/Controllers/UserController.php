<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if(request()->has('empty'))
            $users = [];

        else
            {
                $users = [
                    'Joel', 'Ellie', 'Tess', 'Tommy', 'Bill',
                ];
            }


        $title = 'Listado de usuarios';

        return view('users.index', compact('users', 'title'));
    }

    public function show($id)
    {
        $title = 'Detalle de usuario';

        return view('users.show', compact('id', 'title'));
    }

    public function create()
    {
        return "Crear nuevo usuario";
    }

    public function edit($id)
    {
        return "Editando al usuario: {$id}";
    }
}
