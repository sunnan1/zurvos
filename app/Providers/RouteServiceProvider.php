<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapEmployeeRoutes();

        $this->mapInfluenceRoutes();

        $this->mapCustomerRoutes();

        $this->mapPartnerRoutes();

        $this->mapGymRoutes();

        $this->mapAdminRoutes();

        //
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::group([
            'middleware' => ['web', 'admin', 'auth:admin'],
            'domain' => 'admin.' . env('APP_DOMAIN'),
            'as' => 'admin.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "gym" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapGymRoutes()
    {
        Route::group([
            'middleware' => ['web', 'gym', 'auth:gym'],
            'domain' => 'gym.' . env('APP_DOMAIN'),
            'as' => 'gym.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/gym.php');
        });
    }

    /**
     * Define the "partner" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapPartnerRoutes()
    {
        Route::group([
            'middleware' => ['web', 'partner', 'auth:partner'],
            'domain' => 'partner.' . env('APP_DOMAIN'),
            'as' => 'partner.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/partner.php');
        });
    }

    /**
     * Define the "customer" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapCustomerRoutes()
    {
        Route::group([
            'middleware' => ['web', 'customer', 'auth:customer'],
            'prefix' => 'customer',
            'as' => 'customer.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/customer.php');
        });
    }

    /**
     * Define the "influence" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapInfluenceRoutes()
    {
        Route::group([
            'middleware' => ['web', 'influence', 'auth:influence'],
            'prefix' => 'influence',
            'as' => 'influence.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/influence.php');
        });
    }

    /**
     * Define the "employee" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapEmployeeRoutes()
    {
        Route::group([
            'middleware' => ['web', 'employee', 'auth:employee'],
            'prefix' => 'employee',
            'as' => 'employee.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/employee.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
