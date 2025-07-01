<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthAdminOrMedis
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!in_array(session('login_type'), ['admin', 'medis'])) {
            return redirect('/login');
        }

        return $next($request);
    }
}
