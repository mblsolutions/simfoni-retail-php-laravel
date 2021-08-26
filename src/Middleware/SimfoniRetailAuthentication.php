<?php

namespace MBLSolutions\SimfoniRetailLaravel\Middleware;

use Closure;
use Illuminate\Http\Request;
use MBLSolutions\SimfoniRetail\SimfoniRetail;
use MBLSolutions\SimfoniRetailLaravel\Authentication;
use MBLSolutions\SimfoniRetailLaravel\Exceptions\AuthenticationException;

class SimfoniRetailAuthentication
{
    /** @var Authentication $authentication */
    private $authentication;

    public function __construct()
    {
        $this->authentication = new Authentication;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$this->authentication->isAuthenticated()) {
            throw new AuthenticationException(401);
        }

        $auth = $this->authentication->get();

        SimfoniRetail::setToken($auth['access_token']);

        return $next($request);
    }

}