<?php

namespace MBLSolutions\SimfoniRetailLaravel;

use Exception;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\ServiceProvider;
use MBLSolutions\SimfoniRetail\Exceptions\NotFoundException;
use MBLSolutions\SimfoniRetail\Exceptions\PermissionDeniedException;
use MBLSolutions\SimfoniRetail\Exceptions\ValidationException;
use MBLSolutions\SimfoniRetail\Auth\SimfoniRetail;
use MBLSolutions\SimfoniRetailLaravel\Middleware\LoadSimfoniRetailConfig;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SimfoniRetailServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/SimfoniRetail.php' => config_path('simfoniretail.php'),
        ], 'config');

        $this->registerMiddleware(LoadSimfoniRetailConfig::class);
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SimfoniRetail::class, static function () {
            SimfoniRetail::setBaseUri(config('SimfoniRetail.endpoint'));
            SimfoniRetail::setVerifySSL(config('SimfoniRetail.verify_ssl', true));
            SimfoniRetail::setToken(config('SimfoniRetail.simfoni_api_token'));
            return new SimfoniRetail;
        });
    }

    /**
     * Register Middleware
     *
     * @param $middleware
     * @return void
     */
    public function registerMiddleware($middleware)
    {
        $kernel = $this->app[Kernel::class];

        $kernel->pushMiddleware($middleware);
    }

    /**
     * Simfoni Retail Exception Handling
     *
     * @param $request
     * @param Exception $exception
     * @param callable|null $function
     * @return JsonResponse|RedirectResponse
     */
    public static function exceptionHandling($request, Exception $exception, callable $function = null)
    {
        if (route_contains('async') || route_contains('api')) {
            if ($exception instanceof ValidationException) {
                return JsonResponse::create([
                    'message' => $exception->getMessage(),
                    'errors' => $exception->getValidationErrors()
                ], $exception->getCode());
            }
        }

        if ($exception instanceof HttpException) {
            if ($exception->getStatusCode() === 401) {
                return redirect()->route('login')->withErrors(['Please login to proceed.']);
            }
        }

        if ($exception instanceof PermissionDeniedException) {
            abort(403);
        }

        if ($exception instanceof NotFoundException) {
            abort(404);
        }

        if ($exception instanceof ValidationException) {
            return redirect()->back()->withInput()->withErrors($exception->getValidationErrors());
        }

        return $function();
    }

}