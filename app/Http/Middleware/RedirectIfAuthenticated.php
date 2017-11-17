<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Configuration;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $fecha_actual = Carbon::now();
        
        if (Auth::guard($guard)->check()) {
            $fecha_last_update =  Carbon::createFromFormat('Y-m-d H:i:s',Auth::user()->password_updated_at);
            $conf = new Configuration();
            // $num_dias = $conf->getParameter('daystochangepassword');
           
            if($fecha_actual->diffInDays($fecha_last_update)>=3){
                return redirect('cambiar/password');
            }
            else{
                return redirect('/');
            }
            
        }

        return $next($request);
    }
}
