<?php

namespace App\Http\Middleware;

use App\Http\Controllers\postController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{
        if(!Auth::user()->level == 'admin'){
            return redirect()->action([postController::class, 'indexUser']);
        }
        return $next($request);
    }
}
