<?php

namespace MBLSolutions\SimfoniRetailLaravel\Tests;

use Illuminate\Foundation\Application;
use MBLSolutions\Report\Tests\Fakes\ExportDriver\FakeExportDriver;
use MBLSolutions\Report\Tests\Fakes\Middleware\FakeMiddleware;

class LaravelTestCase extends \Orchestra\Testbench\TestCase
{

    /** {@inheritdoc} **/
    protected function setUp(): void
    {
        parent::setUp();

        $this->setupEnvVariables();
    }

    /**
     * Define environment setup.
     *
     * @param  Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {
        $config = include __DIR__ . '/../config/SimfoniRetail.php';

        $app['config']->set('SimfoniRetail.session', 'SimfoniRetail_auth_session');
        $app['config']->set('SimfoniRetail.client_id', 1);
        $app['config']->set('SimfoniRetail.secret', 'secret');
        $app['config']->set('SimfoniRetail.roles', [
            'admin',
            'programme_manager',
            'customer_service_manager',
            'customer_service_operator',
            //'store_manager',
            //'store_operator',
            //'report',
        ]);
    }


    /**
     * Setup environment variables
     *
     * @return void
     */
    private function setupEnvVariables(): void
    {
        $this->app['config']->set('app.key', 'base64:KMRokGdMt+pgOmbRD+oiKwmfZiKAVxR6KkZ4KuiIo90=');
    }

}