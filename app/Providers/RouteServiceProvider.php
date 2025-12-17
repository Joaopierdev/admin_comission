<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Defina os namespaces das rotas que serão carregadas.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Registra as rotas principais da aplicação
        $this->routes(function () {
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            // Se você estiver usando API, registre as rotas de API também
            Route::middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));
        });
    }

    /**
     * Registre os serviços de roteamento.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
