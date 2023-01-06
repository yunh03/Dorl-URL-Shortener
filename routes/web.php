<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\SupportController;
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

Route::get('/terms', function()
{
    return view('terms');
});

Route::get('/support', [SupportController::class, 'index']);
Route::post('/support', [SupportController::class, 'store']);

Route::get('/results', function()
{
    return view('results');
});

Route::post('/', [ShortLinkController::class, 'store']);
Route::get('{code}', [ShortLinkController::class, 'shortenLink']);