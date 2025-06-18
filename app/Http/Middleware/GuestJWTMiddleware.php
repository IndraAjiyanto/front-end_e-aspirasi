<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GuestJWTMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Jika sudah login (ada session token dan user)
        if (session('token') && session('user')) {
            $role = session('user')['role'] ?? null;

            // Redirect berdasarkan role
            switch ($role) {
                case 'mahasiswa':
                    return redirect()->route('dashboardmahasiswa');
                case 'ppks':
                    return redirect()->route('dashboardppks');
                case 'sarpras':
                    return redirect()->route('dashboardsarpras');
                case 'akademik':
                    return redirect()->route('dashboardakademik');
                default:
                    return redirect('/'); // fallback
            }
        }

        return $next($request); // lanjut akses login/register
    }
}
