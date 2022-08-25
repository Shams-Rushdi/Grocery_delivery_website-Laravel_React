<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use  App\Models\Token;

class APIAuth
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
        $token= $request->header("Authorization");  
        $check_token=Token::where('token',$token)
        ->where('expired_at',NULL)
        ->first();
        // $isDoctor=CUser::where('id',$check_token->userid)
        //      ->where('type','doctor')->first();
        //      $isUser=CUser::where('id',$check_token->userid)
        //      ->where('type',NULL)->first();
        //     if($isDoctor)  
        //         { 
            if($check_token)
            {
                return $next($request);
            }
            
               

                // }
               
      
      
           
        else 
        {
            return response ( "invalid token", 404);
        }
    }
}
