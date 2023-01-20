<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LinksStatisticsController;

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

Route::get('/', [ShortLinkController::class, 'index']);

Route::get('/statistics', [LinksStatisticsController::class, 'index']);
Route::post('/statistics', [LinksStatisticsController::class, 'lookup']);

Route::controller(DashboardController::class)->group(function() {
    Route::get('/dashboard', 'index');
    Route::get('/dashboard/block/{code}', 'block');
    Route::get('/dashboard/support', 'support');
    Route::get('/dashboard/support/c/{code}', 'support_c');
    Route::get('/signin', 'signin');
    Route::get('/signout', 'signout');
    Route::post('/signin/validate', 'validate_signin');
});

Route::get('/terms', function()
{
    return view('terms');
});

Route::controller(SupportController::class)->group(function() {
    Route::get('/support', 'index');
    Route::post('/support', 'store');
    Route::get('/results', 'results');
    Route::post('/results', 'results_c');
});

Route::post('/', [ShortLinkController::class, 'store']);
Route::get('{code}', [ShortLinkController::class, 'shortenLink']);