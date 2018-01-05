<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller
{
    public function name($name)
    {
        $name = ucfirst($name);

        return "Bienvenido {$name}";
    }

    public function apodo($name, $nickname = null)
    {
        $name = ucfirst($name);
        return "Bienvenido {$name}, tu apodo es {$nickname}";
    }
}
