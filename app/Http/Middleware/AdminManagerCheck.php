<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminManagerCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user)
        {
            foreach ($user->roles as $role)
            {
                if ($role->id === 1 or  $role->id === 2)
                {
                    return $next($request);
                }
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('home');
        }

    }
}
