<?php

use Illuminate\Support\Facades\Http;
use App\Http\Middleware\EnsureTokenIsValid;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Common\LoginController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\CartController;
use App\Http\Controllers\Guest\MasterController;



// Route::get('/',function(){

    // $user = \App\Models\User::first();
    // $user -> roles() -> syncWithoutDetaching([2]);
    
    // $roles = \App\Models\Role::first();

    // $user -> roles() -> attach($roles);

    // $roles = \App\Models\Role::find(1);
    // $roles -> users() -> sync([2]);
// });
////////////////////////////////////////////////////////////////////////////////

Route::post('/login', [LoginController::class, 'login'])   -> name('login');


Route::get('/auth', function(){
    // dd(Auth::user() -> name);
    // Session::put('idUserr', 7);
});

Route::get('/auth2', function(){
    dd(session() -> all());
});

Route::get('/auth3', function(){
    dd(Auth::user());
});

//=====================
Route::get('/', function(){
    return redirect('login');
});

Route::get('/logout',function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
});


////////////////////////////////////////////////////////////////////////////////




Route::group(['middleware' => ['guest'],
            'namespace' => 'App\Http\Controllers\Api',
            'prefix' => ''
], function(){

    // Route::match(['get','post'], 'login', ['as' => 'login', 'uses' => 'LoginController@index']);
    Route::post('/logout', [LoginController::class, 'logout'])  -> name('logout');
    Route::get('/login', [LoginController::class, 'login'])  -> name('login');


    Route::get('/user/create', [UserController::class, 'create'])  -> name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])  -> name('user.store');
    Route::get('/detailproduct', [HomeController::class, 'detailproduct'])  -> name('home.detailproduct');




});


Route::group(['middleware' => ['auth:api'],
              'prefix' => ''
], function(){

    Route::get('/home', [HomeController::class, 'index'])->withoutMiddleware(['auth:api'])  -> name('home.index');
    Route::get('home/detailproduct/{id}', [HomeController::class, 'detailproduct'])->withoutMiddleware(['auth:api'])  -> name('home.detailproduct');

    Route::post('/logout', [LoginController::class, 'logout'])  -> name('logout');

    //=========Cart======
    Route::group([
                'prefix' => 'cart'
    ], function(){
        Route::get('/', [CartController::class, 'index'])  -> name('cart.index') ;
        Route::get('/hover/{id}', [CartController::class, 'cartHover'])  -> name('cart.hover');

    });
    //========end cart===== 

});


Route::group(['middleware' => ['auth:api','checkrole'],
              'prefix' => ''
], function(){

    Route::group(['prefix' => '/exams'], function(){
        Route::get('/', [ExamController::class, 'index'])  -> name('exams.index');
        Route::get('/show', [ExamController::class, 'show'])  -> name('exams.show');
        Route::get('/destroy/{id}', [ExamController::class, 'destroy'])  -> name('exams.destroy');
        Route::get('/edit/{id}', [ExamController::class, 'edit'])  -> name('exams.edit');
        Route::put('/update/{id}', [ExamController::class, 'update'])  -> name('exams.update');
        Route::get('/create', [ExamController::class, 'create'])  -> name('exams.create');
        Route::post('/store', [ExamController::class, 'store'])  -> name('exams.store');
    });

    Route::group(['prefix' => '/products'], function(){
        Route::get('/', [ProductController::class, 'index'])  -> name('products.index');
        Route::get('/create', [ProductController::class, 'create'])  -> name('products.create');
        Route::post('/store', [ProductController::class, 'store'])  -> name('products.store');
        Route::get('/destroy/{id}', [ProductController::class, 'destroy'])  -> name('products.destroy');
        Route::get('/show/{id}', [ProductController::class, 'show'])  -> name('products.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])  -> name('products.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])  -> name('products.update');

    });

    Route::group(['prefix' => '/orders'], function(){
        Route::get('/', [OrderController::class, 'index'])  -> name('orders.index');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])  -> name('orders.edit');
        Route::put('/update/{id}', [OrderController::class, 'update'])  -> name('orders.update');

    });



}); 