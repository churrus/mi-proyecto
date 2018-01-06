<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $title = 'Listado de usuarios';

//        return view('users.index')
//            ->with('users', User::all())
//            ->with('title', 'Listado de usuarios';

        return view('users.index', compact('users', 'title'));
    }

    public function show(User $user)
    {
        $title = 'Detalle de usuario';

       return view('users.show', compact('user', 'title'));
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
