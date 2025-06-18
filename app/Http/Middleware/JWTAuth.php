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
            abort(403, 'Access denied.');
        }

        return $next($request);
    }
}
