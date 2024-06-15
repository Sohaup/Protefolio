<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CORS_Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {        
        $response =  $next($request);
        $response->headers->set('Access-Control-Allow-Origin' , '*');
        $response->headers->set('Access-Control-Allow-Methods' , 'GET , POST , PUT , DELETE , PUTCH');
        $response->headers->set('Access-Control-Allow-Headers' , 'Content-type , X-Auth-Token , X-Request-With');
        return $response;
    }
}
