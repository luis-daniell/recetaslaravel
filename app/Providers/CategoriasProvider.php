<?php

namespace App\Providers;

use App\CategoriaReceta;
use Illuminate\Support\ServiceProvider;
use View;
class CategoriasProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

     //Refistra todo antes de que laravel comience
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    //Se ejecuta todo cuando la apliacion esta lista
    public function boot()
    {
        //
        View::composer('*', function($view){

            $categorias = CategoriaReceta::all();

            $view->with('categorias', $categorias);
        });
    }
}
