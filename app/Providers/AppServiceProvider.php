<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\EspecieMascota;
use App\Models\EspecieTamanoMascota;
use App\Models\TamanoMascota;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer([
            'app.paciente.modales.dependientes.agregar',
            'app.paciente.dependientes',
            'app.paciente_dependiente.dependientes',
        ], function ($view) {
            $data = $view->getData();

            $especies = !empty($data['especiesMascotas'] ?? null)
                ? $data['especiesMascotas']
                : EspecieMascota::orderBy('nombre')->get();

            $tamanos = !empty($data['tamanosMascotas'] ?? null)
                ? $data['tamanosMascotas']
                : TamanoMascota::orderBy('nombre')->get();

            $pivot = !empty($data['especieTamanosMascotas'] ?? null)
                ? $data['especieTamanosMascotas']
                : EspecieTamanoMascota::with(['especie', 'tamano'])->get();

            $view->with([
                'especiesMascotas' => $especies,
                'tamanosMascotas' => $tamanos,
                'especieTamanosMascotas' => $pivot,
            ]);
        });
    }
}
