<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $session = get_admin_session();

        if ($request->segment(2) != 'logout') {
            if (!empty($session)) {
                return redirect('admin/dashboard');
            }
        }

        return $next($request);

    }
}
