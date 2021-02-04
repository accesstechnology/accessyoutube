<?php

namespace App\Http\Middleware;
use DB;
use Closure;

class dbCheck
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

        $v = $request->v;

        $words = DB::table('bad_words')->pluck('word');

        foreach ($words as $word) {

        if (preg_match("/\b$word\b/i", $v)) {

                return redirect('');

            }

        }

        return $next($request);


    }
}
