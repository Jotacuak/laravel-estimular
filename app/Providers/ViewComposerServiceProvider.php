<?php

/*
|--------------------------------------------------------------------------
| Provider para contenidos recurrentes de la web
|--------------------------------------------------------------------------
|   Se sigue la estructura de este ejemplo: https://laracasts.com/series/laravel-5-fundamentals/episodes/25 
|   modificado el archivo config/app providers para incluir este archivo. 
|
|   Con este archivo evitamos tener que repetir código solicitando los contenidos que se repiten en cada vista. 
|
|   Dentro de boot se define en qué vistas y qué contenidos queremos que se carguen. Es posible pasar un array
|   de vistas, para que un mismo contenido esté disponible en ellas cada vez que son renderizadas.
|
|   En la carpeta /app/Http/ViewComposers se define los contenidos que queremos tener disponibles.
|
*/

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        view()->composer([
            'admin.pages.faqs.index'],
            'App\Http\ViewComposers\Admin\FaqsCategories'
        );

        view()->composer([
            'admin.pages.posts.index'],
            'App\Http\ViewComposers\Admin\PostsCategories'
        );

        view()->composer([
            'admin.pages.prices.index'],
            'App\Http\ViewComposers\Admin\RatesComposers'
        );

        view()->composer([
            'front.comnponents.desktop.main_blog_nav'],
            'App\Http\ViewComposers\Front\PostsCategories'
        );

        view()->composer([
            'front.comnponents.mobile.main_blog_nav'],
            'App\Http\ViewComposers\Front\PostsCategories'
        );
    }

    public function register()
    {
        //
    }
}