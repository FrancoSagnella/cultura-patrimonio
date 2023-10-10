<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Defino validaciones custom:
        //Validacion que el campo no tenga como valor "default"
        Validator::extend('noDefault', function ($attribute, $value, $parameters, $validator) {
            return strcmp($value, 'default') !== 0;
        });

        //Validacion que el campo no tenga como valor "default" en caso de que bien-padre sea 3 o 4
        Validator::extend('noDefault_condicional', function ($attribute, $value, $parameters, $validator) {
            $tipoBien = $validator->getData()['bien-padre'];

            // Aplica la lógica de validación personalizada aquí
            if ($tipoBien == 2 || $tipoBien == 3 || $tipoBien == 4 || $tipoBien == 371) {
                return strcmp($value, 'default') !== 0;
            }

            return true; // No se aplica la validación personalizada si no cumple la condición

        });


        //Validacion que el campo no tenga como valor "default" en caso de que tipobien-final-seleccionado sea 322 o 136 o 63
        Validator::extend('noDefault_condicional_usuarioResponsable', function ($attribute, $value, $parameters, $validator) {
            $tipoBien = $validator->getData()['tipobien-final-seleccionado'];

            // Aplica la lógica de validación personalizada aquí
            if ($tipoBien == 322 || $tipoBien == 136 || $tipoBien == 63) {
                return strcmp($value, 'default') !== 0;
            }

            return true; // No se aplica la validación personalizada si no cumple la condición

        });

        //Validacion que el campo tenga no como valor "sinSeleccion"
        Validator::extend('seleccionado', function ($attribute, $value, $parameters, $validator) {
            return strcmp($value, 'sinSeleccion') !== 0;
        });
    }
}
