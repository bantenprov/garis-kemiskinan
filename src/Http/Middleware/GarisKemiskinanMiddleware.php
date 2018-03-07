<?php

namespace Bantenprov\GarisKemiskinan\Http\Middleware;

use Closure;

/**
 * The GarisKemiskinanMiddleware class.
 *
 * @package Bantenprov\GarisKemiskinan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class GarisKemiskinanMiddleware
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
        return $next($request);
    }
}
