<?php

use Illuminate\Support\Facades\Route;
use App\Vendor\Locale\LocalizationSeo;

$localizationseo = new LocalizationSeo();

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function () {

    Route::get('/image/delete/{image?}', 'App\Vendor\Image\Image@destroy')->name('delete_image');
    Route::get('/image/temporal/{image?}', 'App\Vendor\Image\Image@showTemporal')->name('show_temporal_image_seo');
    Route::get('/image/{image}', 'App\Vendor\Image\Image@show')->name('show_image_seo');
    Route::post('/image/seo', 'App\Vendor\Image\Image@storeSeo')->name('store_image_seo'); 

    Route::resource('usuarios', 'App\Http\Controllers\Admin\UserController', [
        'parameters' => [
            'usuarios' => 'user', 
        ],
        'names' => [
            'index' => 'users',
            'create' => 'users_create',
            'edit' => 'users_edit',
            'store' => 'users_store',
            'destroy' => 'users_destroy',
            'show' => 'users_show',
        ]
    ]);

    Route::resource('precios', 'App\Http\Controllers\Admin\PriceController', [
        'parameters' => [
            'precios' => 'price', 
        ],
        'names' => [
            'index' => 'prices',
            'create' => 'prices_create',
            'edit' => 'prices_edit',
            'store' => 'prices_store',
            'destroy' => 'prices_destroy',
            'show' => 'prices_show',
        ]
    ]);

    Route::resource('tarifas', 'App\Http\Controllers\Admin\RateController', [
        'parameters' => [
            'tarifas' => 'rate', 
        ],
        'names' => [
            'index' => 'rates',
            'create' => 'rates_create',
            'edit' => 'rates_edit',
            'store' => 'rates_store',
            'destroy' => 'rates_destroy',
            'show' => 'rates_show',
        ]
    ]);

    Route::resource('terapias', 'App\Http\Controllers\Admin\TherapyController', [
        'parameters' => [
            'terapias' => 'therapy', 
        ],
        'names' => [
            'index' => 'therapies',
            'create' => 'therapies_create',
            'edit' => 'therapies_edit',
            'store' => 'therapies_store',
            'destroy' => 'therapies_destroy',
            'show' => 'therapies_show',
        ]
    ]);

    Route::resource('equipo', 'App\Http\Controllers\Admin\WorkerController', [
        'parameters' => [
            'equipo' => 'worker', 
        ],
        'names' => [
            'index' => 'workers',
            'create' => 'workers_create',
            'edit' => 'workers_edit',
            'store' => 'workers_store',
            'destroy' => 'workers_destroy',
            'show' => 'workers_show',
        ]
    ]);

    Route::resource('faqs/categorias', 'App\Http\Controllers\Admin\FaqCategoryController', [
        'parameters' => [
            'categorias' => 'faqs_category', 
        ],
        'names' => [
            'index' => 'faqs_categories',
            'create' => 'faqs_categories_create',
            'edit' => 'faqs_categories_edit',
            'store' => 'faqs_categories_store',
            'destroy' => 'faqs_categories_destroy',
            'show' => 'faqs_categories_show',
        ]
    ]);    

    Route::get('/faqs/filter/{filters?}', 'App\Http\Controllers\Admin\FaqController@filter')->name('faqs_filter');
    Route::resource('faqs', 'App\Http\Controllers\Admin\FaqController', [
        'parameters' => [
            'faqs' => 'faq', 
        ],
        'names' => [
            'index' => 'faqs',
            'create' => 'faqs_create',
            'edit' => 'faqs_edit',
            'store' => 'faqs_store',
            'destroy' => 'faqs_destroy',
            'show' => 'faqs_show',
        ]
    ]);

    Route::resource('blog/categorias', 'App\Http\Controllers\Admin\PostCategoryController', [
        'parameters' => [
            'categorias' => 'post_category', 
        ],
        'names' => [
            'index' => 'posts_categories',
            'create' => 'posts_categories_create',
            'edit' => 'posts_categories_edit',
            'store' => 'posts_categories_store',
            'destroy' => 'posts_categories_destroy',
            'show' => 'posts_categories_show',
        ]
    ]);

    Route::get('/blog/filter/{filters?}', 'App\Http\Controllers\Admin\PostController@filter')->name('posts_filter');
    Route::resource('blog', 'App\Http\Controllers\Admin\PostController', [
        'parameters' => [
            'blog' => 'post', 
        ],
        'names' => [
            'index' => 'posts',
            'create' => 'posts_create',
            'edit' => 'posts_edit',
            'store' => 'posts_store',
            'destroy' => 'posts_destroy',
            'show' => 'posts_show',
        ]
    ]);

    //Admin Slides
    Route::resource('sliders', 'App\Http\Controllers\Admin\SlideController', [
        'parameters' => [
            'sliders' => 'slide', 
        ],
        'names' => [
            'index' => 'sliders',
            'create' => 'sliders_create',
            'edit' => 'sliders_edit',
            'store' => 'sliders_store',
            'destroy' => 'sliders_destroy',
            'show' => 'sliders_show',
        ]
    ]);

    //Login admin
    Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('admin_login');
    Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('admin_login_submit');
    Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::get('/', function () {
        return redirect()->route('admin_login');
    });
   
});

Route::get('/', 'App\Http\Controllers\Front\HomeController@index')->name('front_home');
Route::get('/equipo', 'App\Http\Controllers\Front\TeamController@index')->name('front_team');
Route::get('/contacto', 'App\Http\Controllers\Front\ContactController@index')->name('front_contact');
Route::get('/terapias/{slug}', 'App\Http\Controllers\Front\TherapyController@show')->name('front_therapy');
Route::get('/blog', 'App\Http\Controllers\Front\BlogController@index')->name('front_blog');
Route::get('/blog/categoria/{slug}', 'App\Http\Controllers\Front\BlogController@categoryFilter')->name('post_category_filter');
Route::get('/blog/{slug}', 'App\Http\Controllers\Front\BlogController@index')->name('front_post');
Route::get('/tarifas', 'App\Http\Controllers\Front\RateController@index')->name('front_rates');
Route::get('/faqs', 'App\Http\Controllers\Front\FaqController@index')->name('front_faq');


// Route::group(['prefix' => $localizationseo->setLocale(),
//               'middleware' => [ 'localize' ]
//             ], function () use ($localizationseo) { 
                
//     Route::get($localizationseo->transRoute('routes.front_post'), 'App\Http\Controllers\Front\BlogController@show')->name('front_post');
// });