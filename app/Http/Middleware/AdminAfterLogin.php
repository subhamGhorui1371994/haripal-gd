<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class AdminAfterLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $session = get_admin_session();

        if (empty($session)) {
            return redirect('admin/login');
        }

        return $next($request);
    }

}
