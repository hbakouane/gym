<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\CreditsController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\VendorsController;
use App\Http\Controllers\StavesController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Auth\Login\StaffController as LoginStaffController;
use App\Http\Controllers\PermissionController;

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

Route::prefix('staff')
    ->as('staff.')
    ->group(function() {
        Route::get('home', [StaffController::class, 'index'])->name('home');
        Route::namespace('Auth\Login')
            ->group(function() {
                Route::get('login', [LoginStaffController::class, 'showLoginForm'])->name('login.get');
                Route::post('login', [LoginStaffController::class, 'login'])->name('login.post');
                Route::post('logout', [LoginStaffController::class, 'logout'])->name('logout');
        });
});

//// Repeat all theses routes for the staff and add the prefix /staff
//Route::group(['middleware' => 'auth:staff', 'prefix' => 'staff'], function () {
//    Route::get('/dashboard', [RedirectController::class, 'redirect']);
//});
//
//Route::group(['prefix' => 'staff/{project_id}', 'middleware' => ['auth:staff', 'roleChecker'], 'as' => 'staff.'], function () {
//    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//    Route::resource('/members', MemberController::class);
//    Route::resource('/subscriptions', SubscriptionController::class);
//    Route::resource('/features', FeatureController::class);
//    Route::resource('/payments', PaymentsController::class);
//    Route::resource('/credits', CreditsController::class);
//    Route::resource('/expenses', ExpensesController::class);
//    Route::resource('/invoices', InvoicesController::class);
//    Route::resource('/vendors', VendorsController::class);
//});
//
//// Repeating finished

Route::group(['middleware' => 'auth'], function () {
    Route::view('/project/create', 'projects.create')->name('project.create');
    Route::get('/dashboard', [RedirectController::class, 'redirect']);
});

Route::group(['prefix' => '{project_id}', 'middleware' => ['auth:web,staff', 'checkProject', 'roleChecker']], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/members', MemberController::class);
    Route::resource('/subscriptions', SubscriptionController::class);
    Route::resource('/features', FeatureController::class);
    Route::get('/user/settings', [UserController::class, 'show'])->name('user.settings.show');
    Route::post('/user/settings', [UserController::class, 'store'])->name('user.settings.store');
    Route::resource('/payments', PaymentsController::class);
    Route::resource('/credits', CreditsController::class);
    Route::resource('/expenses', ExpensesController::class);
    Route::resource('/invoices', InvoicesController::class);
    Route::resource('/vendors', VendorsController::class);
    Route::resource('/staves', StavesController::class);
    Route::resource('/roles', RolesController::class);
    Route::post('/permissions', PermissionController::class)->name('permissions.store');
});


Route::fallback(function () {
    return "404";
});
