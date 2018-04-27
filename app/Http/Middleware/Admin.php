<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
      // Check if authed user is admin
        if (auth()->user()->role != "admin") {

           $noAdmin = true;

           // Pass noAdmin back to the controller

           return redirect('/')->withErrors(compact('noAdmin'));
        }

        return $next($request);
    }
}
