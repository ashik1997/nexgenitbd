<?php

namespace App\Http\Middleware;

use App\Models\VisitorActivity;
use Closure;
use Illuminate\Http\Request;

class VisitorMiddleware
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
        $visitor = new VisitorActivity();

        $ip = geoip()->getClientIP();
        $visitor->ip        =   $ip;
        $visitor->iso_code  =   geoip()->getLocation($ip)->iso_code;
        $visitor->country   =   geoip()->getLocation($ip)->country;
        $visitor->city      =   geoip()->getLocation($ip)->city;
        $visitor->state     =   geoip()->getLocation($ip)->state;
        $visitor->state_name    =   geoip()->getLocation($ip)->state_name;
        $visitor->postal_code   =   geoip()->getLocation($ip)->postal_code;
        $visitor->lat       =   geoip()->getLocation($ip)->lat;
        $visitor->lon       =   geoip()->getLocation($ip)->lon;
        $visitor->timexone  =   geoip()->getLocation($ip)->timexone;
        $visitor->continent =   geoip()->getLocation($ip)->continent;
        $visitor->currency  =   geoip()->getLocation($ip)->currency;
        $visitor->default   =   geoip()->getLocation($ip)->default;
        $visitor->cached    =   geoip()->getLocation($ip)->cached;
        $visitor->browser   =   get_client_browser();
        $visitor->device    =   get_client_device();
        $visitor->os        =   get_client_os();
        $visitor->url       =   $request->url();
        $visitor->save();

        return $next($request);
    }
}
