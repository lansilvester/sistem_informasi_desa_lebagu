<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            // Jika pengguna belum login, arahkan ke halaman login
            return redirect()->route('login');
        }

        if (!$user->hasAnyRole(...$roles)) {
            // Jika pengguna tidak memiliki peran yang diperlukan, arahkan ke halaman yang sesuai
            return redirect()->route('dashboard'); // Gantilah dengan rute yang sesuai
        }

        return $next($request);
    }
}