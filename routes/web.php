<?php

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

use Illuminate\Routing\Router;

Route::get('/login', function(){
    return 'Login';
})->name('login');
/*
Route::middleware([])->group(function(){

    Route::prefix('admin')->group(function(){

        Route::namespace('Admin')->group(function(){

            Route::name('admin.')->group(function(){
                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
        
                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
                
                Route::get('/produtos','TesteController@teste')->name('produtos');
        
                Route::get('/', function(){
                    return redirect()->route('admin.dashboard');
                })->name('home');
            });

        });

    });

    
});
*/
Route::group([    
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'name' => 'admin.'
], function(){
    Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
        
                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
                
                Route::get('/produtos','TesteController@teste')->name('produtos');
        
                Route::get('/', function(){
                    return redirect()->route('admin.dashboard');
                })->name('home');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/contato', function(){
    return 'Contato';
});

Route::get('/empresa', function(){
    return view('site.contact');
});

Route::post('/register', function(){
    return '';
});

Route::any('/any', function(){
    return 'Any';
});

Route::match(['get', 'post'], '/match', function(){
    return 'Match';
});

Route::get('/categorias/{flag}', function($prm1){
    return "Produtos da categoria: {$prm1}";
});

Route::get('/categoria/{flag}/posts', function($flag){
    return "Produtos da categoria: {$flag}";
});

Route::get('/produtos/{idProduct?}', function($idProduct = '0'){
    return "Produto(s) {$idProduct}";
});

Route::view('/view', '/welcome');

Route::redirect('/redirect1', '/redirect2');

// Route::get('redirect1', function(){
//     return redirect('/redirect2');
// });

Route::get('redirect2', function(){
    return 'Redicerct2';
});

Route::get('/nome-url', function(){
    return 'Hey hey hey';
})->name('url.name');

// route('url.name');

Route::get('redirect3', function(){
    return redirect()->route('url.name');
});
