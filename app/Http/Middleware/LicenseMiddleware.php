<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class LicenseMiddleware
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

        $now = date('Y-m-d H:m:s');
        $expiredDt = date("2020-12-01");
        if($now > $expiredDt){
//            return view('expired');
            return redirect(route('expired'));
        }
        return $next($request);
    }
}
