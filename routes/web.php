<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



Route::group(['prefix' => '/', 'checkUser'=>'auth'], function(){
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/the-loai/{slug}', 'HomeController@theloai');
    Route::get('/quoc-gia/{slug}', 'HomeController@quocgia');
    Route::get('/kho-phim', 'HomeController@khophim');
    Route::get('/phim-le/{slug}', 'HomeController@phimle');
    Route::get('/phim-bo/{slug}', 'HomeController@phimbo');
    Route::get('/phim-chieu-rap/{slug}', 'HomeController@phimchieurap');
    Route::get('/chi-tiet/{slug}', 'HomeController@chitiet')->name('home.chi-tiet');
    Route::get('/xem-phim/{slug}', 'HomeController@xemphim')->name('home.xem-phim');
    Route::get('/dangky', 'HomeController@dangky')->name('home.dangky');

    Route::resource('menu','menuController');

});




Route::group(['prefix' => 'admin','middleware'=>['checkAdmin','auth']], function(){
    Route::get('/', 'adminController@dashboard')->name('admin.dashboard');

    Route::resources([
        'loaiphim' => 'loaiphimController',
        'phim' => 'phimController',
        'quocgia' => 'quocgiaController',
        'kieuphim' => 'kieuphimController',
        'phimle' => 'phimleController',
        'phimbo' => 'phimboController',
        'phimchieurap' => 'phimchieurapController',
        'tapphim' => 'tapphimController',
        'account' => 'accountController',
        'thongke' => 'ChartController',
    ]);
});


// Route::get('auth/redirect', 'SocialController@redirect');
// Route::get('auth/callback', 'SocialController@callback');

