<?php
namespace App\Http\Middleware;

use Closure;

class JWTAuth
{
    public function handle($request, Closure $next, $role = null)
    {
        $token = session('token');

        if (!$token) {
            return redirect('/login');
        }

        $payload = json_decode(base64_decode(explode('.', $token)[1]), true);

        if ($role && $payload['role'] !== $role) {
            // Redirect ke dashboard sesuai role
            switch ($payload['role']) {
                case 'mahasiswa':
                    return redirect()->route('dashboardmahasiswa');
                case 'ppks':
                    return redirect()->route('dashboardppks');
                case 'sarpras':
                    return redirect()->route('dashboardsarpras');
                case 'akademik':
                    return redirect()->route('dashboardakademik');
                default:
                    return redirect('/');
            }
        }

        return $next($request);
    }
}
