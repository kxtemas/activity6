<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;


class MyTestMiddleware
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
        
        Log:: info("Entering My Test Middleware is handle()");
        //using the data cache in laraverl
        //step one  get a instance in one of the caches in this case the file
        //step 2 get a value form the cache and if the cache value is not there we will put it in the cache
        if($request->username !=null)
        {
            Log::info ("in not null...:" . $request->username);
            $value= Cache::store("file")->get("mydata");
            if($value==null)
            {
                Log::info("Caching first time Username for: " . $request->username);
                Cache:: store("file")->put("mydata", $request->username, 1);
            }
        }
        else{
            $value= Cache::store("file")->get("mydata");
            if($value !=null)
            {
            Log::info("Getting username from cache: ". $value);
            }
            else 
            {
                Log::info("Could not get Username from cache (data older than 1 min)");
            }
        }
        return $next($request);
    }
}
