<?php

namespace App\Http\Middleware;

use App\Vendor;
use Closure;
use Illuminate\Support\Facades\Auth;

class shopRequired
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
        $vendor = Vendor::where('vendor_owner', Auth::guard('admin')->user()->id)->get();
        if(count($vendor) === 0){
            $text ="You currently do not have any shops. you need to add a shop to view this page";
            return response()->view('admin.404', ["text" => $text, "link" => "vendor.create"]);
        }
        foreach($vendor as $vend){
            if($vend->vendor_verified === 0){
                $text ="We're doing some background checks. Please wait patiently while your information is being verified.";
                return response()->view('admin.404', ["text" => $text]);
            }
            if($vend->vendor_status === 404){
                $text ="Opps! your account has being blocked";
                return response()->view('admin.404');
            }
        }       
        return $next($request);
    }
}
