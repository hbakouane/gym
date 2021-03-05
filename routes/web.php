<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\Auth\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/settings', [UserController::class, 'show'])->name('user.settings.show');
    Route::post('/user/settings', [UserController::class, 'store'])->name('user.settings.store');
});

Route::group(['prefix' => '{project_id}', 'middleware' => ['auth']], function () {
   Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   Route::resource('/members', MemberController::class);
   Route::resource('/subscriptions', SubscriptionController::class);
   Route::resource('/features', FeatureController::class);
});

Route::fallback(function () {
    return "404";
});
