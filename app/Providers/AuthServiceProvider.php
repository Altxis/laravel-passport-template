<?php

namespace App\Providers;

//use App\Http\Controllers\AccessTokenController;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-clients', function ($user) {
            return $user->is_admin;
        });

        Passport::routes(function ($router) {
            $router->forAuthorization();
            $router->forAccessTokens();
            $router->forTransientTokens();
            $router->forPersonalAccessTokens();
            Route::group(['middleware' => ['web', 'auth', 'can:manage-clients']], function ($router) {
                $router->get('/clients', [
                    'uses' => 'ClientController@forUser',
                    'as' => 'passport.clients.index',
                ]);

                $router->post('/clients', [
                    'uses' => 'ClientController@store',
                    'as' => 'passport.clients.store',
                ]);

                $router->put('/clients/{client_id}', [
                    'uses' => 'ClientController@update',
                    'as' => 'passport.clients.update',
                ]);

                $router->delete('/clients/{client_id}', [
                    'uses' => 'ClientController@destroy',
                    'as' => 'passport.clients.destroy',
                ]);
            });
        });

        Passport::tokensExpireIn(now()->addMinutes(20));

        Passport::tokensExpireIn(now()->addMinutes(20));

        Passport::refreshTokensExpireIn(now()->addYear());
    }
}
