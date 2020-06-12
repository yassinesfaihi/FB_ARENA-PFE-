<?php

namespace App\Http\Middleware;

use Closure;

class checkrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role == 'prop') {
            return $next($request);
        } elseif (auth()->user()->role == 'gerant') {
            return redirect('404');
        } else
            return redirect('profil');
    }
}