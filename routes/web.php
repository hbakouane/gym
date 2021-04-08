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
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SassController;
use App\Http\Controllers\MollieController;
use App\Http\Controllers\LanguageController;

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
})->name('homepage');

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

// Public pages
Route::get('/dashboard', [RedirectController::class, 'redirect'])->middleware('auth:web,staff');
Route::view('/upcoming-features', 'upcoming.features')->name('upcoming.features');
Route::view('/terms-and-conditions', 'terms.and.conditions')->name('terms.and.conditions');
Route::group(['middleware' => ['auth', 'createProjectChecker']], function () {
    Route::view('/project/create', 'projects.create')->name('project.create');
});

Route::get('/pay', [SassController::class, 'index'])->name('plans.show');
Route::get('/projects/manage', [ProjectsController::class, 'manageProjects'])->name('projects.manage')->middleware(['auth', 'password.confirm']);
Route::post('/language/change', [LanguageController::class, 'change'])->name('language.change');

Route::group(['prefix' => '{project_id}', 'middleware' => ['auth:web,staff', 'checkProject', 'roleChecker', 'subscriptionChecker']], function () {
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
    Route::resource('/memberships', MembershipController::class);
    Route::get('/settings', [ProjectsController::class, 'index'])->name('website.settings');
});

// Mollie Payments Routes
Route::get('payment',[MollieController::Class,'preparePayment'])->name('mollie.payment');
Route::get('success',[MollieController::Class, 'paymentSuccess'])->name('order.success');

Route::fallback(function () {
    return "404";
});
