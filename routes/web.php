<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::group(['prefix' => '{locale}', 'middleware' => 'web'], function () {
    Route::get('/', function () {
        return redirect('/dashboard');
    });
    Auth::routes();

    # Admin Route
    Route::resource('dashboard', OverviewController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('catalog', CatalogController::class);

    // PHP ARTISAN
    Route::get('/storage-link', function () {
        $exitCode = Artisan::call('storage:link:create');
        return "Storage link created with exit code: $exitCode";
    });
    Route::get('/migrate', function () {
        $exitCode = Artisan::call('migrate:run');
        return "Migrations completed with exit code: $exitCode";
    });
    Route::get('/db-seed', function () {
        $exitCode = Artisan::call('seed:run');
        return "Seeding completed with exit code: $exitCode";
    });
    Route::get('/clear-cache', function () {
        Artisan::call('optimize:clear');
        return 'Cache cleared successfully.';
    });
});
