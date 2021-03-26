<?php


namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Closure;

class MySecurityMiddleWare
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
        //Step 1: Use the following to get the route URI $request->path or
        // can also use the $request->is();
        $path = $request->path();
        Log::info("Entering MySecurityMiddleware in handle() at path: " . $path);
        //Step 2: Run the business rules that check for the URI's so that you do not need to secure
        $secureCheck = false;
        if($request->is('/') || $request->is('login') || $request->is('doLogin') ||
            $request->is('/usersrest') || $request->is('/loggingservice') || $request->is('/usersrest/*'))
            $secureCheck = true;
        
        Log::info($secureCheck ? "SecurityMiddleware in handler()... NeedsSecurity" :
            "Security Middlware in handle()... No Security required");
        
        //Step 3: If entering a secure URI with no security token, then redirect to the URI to login page
        if(session()->get('security')=='enabled')
            return $next($request);
        Log::info("This is the session in the security middleware: " . session()->get('security'));
        if($secureCheck)
        {
            Log::info("Leaving MySecurityMiddleware in handle() doing a redirect back to login");
            return redirect('/login');
        }
        
        return $next($request);
    }
}
