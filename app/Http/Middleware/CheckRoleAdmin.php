<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRoleAdmin
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
        // dd(Auth::check());
        //check user chưa login và user->role !== member
        if (Auth::check() === false) {
            return redirect()->route('auth.login_form');
        }
        if (Auth::user()->role !== config('role.admin')) {
            abort(403);
        }
        return $next($request);
    }
}
