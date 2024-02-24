<?php

namespace App\Http\Middleware;

use Closure;
use App\UsersEnrolment;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = \Auth::user()->id;
        $enrole = UsersEnrolment::where('users_id', '=', $user)->firstOrFail()->role_id;
        
        if(in_array($enrole, $roles)){
            return $next($request);
        }
        
        return redirect('/');
    }
}
