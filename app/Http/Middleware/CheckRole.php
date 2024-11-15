<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {

        \Log::info('CheckRole middleware executed', ['role' => $role]);

        // Pastikan user sudah login
        if (!auth()->check()) {
            \Log::warning('User not logged in.');
            return redirect()->route('auth.login');
        }
    
        // Jika role tidak sesuai, tampilkan halaman 403 Forbidden, bukan redirect ke login
        if (auth()->user()->role !== $role) {
            \Log::warning('User role mismatch.', ['expected_role' => $role, 'user_role' => auth()->user()->role]);
            abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
        }
    
        return $next($request);
    }
}
