<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        //creamos una variable y le pasamos loas notificaciones no leidas por el usuario
        $notificaciones = auth()->user()->unreadNotifications;


        //una vez vistas las maramos como leidas
        auth()->user()->unreadNotifications->markAsRead();
        return view('notificaciones.index', [
            'notificaciones' => $notificaciones
        ]);
    }
}



// ESTE CONTROLADOR SE HA CREADO CON LA BANDER  --invokable proque solo vamos a utilizar este metodo

//(   ./vendor/bin/sail artisan make:controller NotificacionController --invokable)