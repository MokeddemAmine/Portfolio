<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisitWebsite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $visits = Visit::where('created_at','LIKE',date('Y-m-d').'%')->first();
        if($visits){
            $visits->update([
                'visit_website'     => $visits->visit_website + 1,
            ]);
        }else{
            Visit::create([
                'visit_website' => 1,
            ]);
        }
        return $next($request);
    }
}
