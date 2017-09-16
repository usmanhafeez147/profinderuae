<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckCompany
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
        if(!empty(auth()->guard('company')->id()))
        {
            $data = DB::table('companies')
                    ->select('companies.id')
                    ->where('companies.id',auth()->guard('company')->id())
                    ->get();
            

            if (!$data[0]->id)
            {
                //dd("data not found");
                return redirect()->route('viewLoginForm');
            }

            return $next($request);
           
        }
        else 
        {
            return redirect()->route('viewLoginForm');
        }
    }
}
