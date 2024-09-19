<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\Home;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DataShared
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $logo = Home::where('section','website')->first();
        view()->share('logo', $logo);
        
        return $next($request);
    }
}
