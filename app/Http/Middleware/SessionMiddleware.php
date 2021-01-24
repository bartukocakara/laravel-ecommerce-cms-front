<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionMiddleware
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
        if(session('customer'))
        {
            view()->share(Session::get('customer'));
            return $next($request);
        }
        else
        {
            return redirect()->back()->with("notLoggedIn", "Sepetinize ürün eklemek için giriş yapınız");
        }
    }
}
