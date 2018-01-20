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
        return view('users.create');
    }

    public function edit(User $user)
    {
        $title = 'Editar usuario';

        return view('users.edit', compact('user', 'title'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:7',
        ],[
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'No es un email válido',
            'email.unique' => 'El email ya existe en la Base de datos.',
            'password.required' => 'El campo password es obligatorio',
            'password.min' => 'El password tiene que tener más de 6 caracteres.',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return redirect()->route('users.index');
    }
}
