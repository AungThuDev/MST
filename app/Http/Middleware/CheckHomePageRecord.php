<?php

namespace App\Http\Middleware;

use App\Models\HomePage;
use Closure;
use Illuminate\Http\Request;

class CheckHomePageRecord
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(HomePage::count() == 1)
        {
            return redirect()->route('admin.homepage.index');
        }

        return $next($request);
    }
}
