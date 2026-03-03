<?php

namespace MBLSolutions\SimfoniRetailLaravel\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;
use MBLSolutions\SimfoniRetail\Auth\SimfoniRetail;

class LoadSimfoniRetailConfig
{
    protected SimfoniRetail $config;

    /**
     * Create a new middleware Instance
     *
     * @param SimfoniRetail $simfoni
     */
    public function __construct(SimfoniRetail $simfoni)
    {
        $this->config = $simfoni;
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next): mixed
    {
        return $next($request);
    }

}