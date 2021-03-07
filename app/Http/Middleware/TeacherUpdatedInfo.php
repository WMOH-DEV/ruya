<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherUpdatedInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() AND Auth::user()->role_id == 1 AND Auth::user()->isUpdated == 1) {
            return redirect('/')->with('status', 'لقد قمت بالفعل بتقديم الطلب مسبقاً');
        }
        return $next($request);
    }
}
