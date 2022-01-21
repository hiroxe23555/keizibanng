<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MessageController;
use App\Htttp\Controllers\Controller;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', [PagesController::class, 'index']);
Route::resource('/users', UsersController::class)->except(['create','edit']);
Route::resource('/users/{thread}/messages', MessageController::class)->except(['create','update']);

Route::get('any', function () {
    return view('app');
})->where('any', '.*');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//管理側ログイン
Route::prefix('admin')->group(function () {
	Route::get('login', [LoginController::class, 'showLoginForm'],function(){
	})->name('admin.admin_login');
	Route::post('login', [LoginController::class,'login']);
});
//管理側
Route::middleware(['auth:admin'])->group(function () {
	Route::prefix('admin')->as('admin.')->group(function () {
		
		//管理側トップ
		Route::resource('/user', UserController::class)->except(['create','store','edit']);
		//ログアウト実行
		Route::post('logout', [LoginController::class],function(){
		})->name('logout');
		Route::resource('/user/{thread}/messages',MessagesController::class)->only(['destroy']);
	});
});
