<?php

namespace App\Http\Middleware;

use Closure;

class rewrite
{

    public function handle($request, Closure $next)
    {

        //if post request from search, redirect to url after rewriting
        if (null!==$request->input('v')) {

            return redirect(rewrite($request->input('v')));

        }

        //url used directly
        $v = $request->v;
        
        //check request for white space in url and rewrite
        if ( preg_match('/\s/',$v) ) {
            
            $v = rewrite($v);
            
            //rewrite v parameter for use in next middleware and controller
            $request->route()->setParameter('v', $v);
            
        }

        return $next($request);
    }
}
