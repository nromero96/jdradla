<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckInscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // Verifica si el usuario está autenticado
        // Verifica si el usuario está autenticado
if (Auth::check()) {
    $user = Auth::user();

    // Verifica si el usuario tiene el rol "Participante"
    if ($user->hasRole('Participante')) {
        // Excluye las rutas que ya manejan redirección o permiten acciones específicas
        $allowedRoutes = ['inscriptions.myinscription', 'inscriptions.storemyinscription', 'specialcodes.validatespecialcode'];

        // Si la ruta actual es una de las permitidas, deja que continúe sin redirigir
        if (in_array($request->route()->getName(), $allowedRoutes)) {
            return $next($request);
        }

        // Realiza una consulta directa a la tabla de inscripciones
        $inscriptionExists = DB::table('inscriptions')
            ->where('user_id', $user->id)
            ->exists();

        // Si el usuario tiene inscripción, permite acceder a todas las demás rutas
        if ($inscriptionExists) {
            return $next($request);
        } 

        // Si el usuario no tiene inscripción, redirige a inscriptions.myinscription con un mensaje de error
        return redirect()->route('inscriptions.myinscription')->with('error', 'Por favor, realiza tu inscripción completando el formulario.');
    }
}

// Permite que el flujo continúe para otros usuarios o situaciones
return $next($request);


    }
}
