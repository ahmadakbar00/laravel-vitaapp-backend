<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/profile', [App\Http\Controllers\Api\ArticleController::class, 'showProfile' ]);

Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');

Route::get('/articles', [App\Http\Controllers\Api\ArticleController::class, 'index' ]);
Route::post('/articles', [App\Http\Controllers\Api\ArticleController::class, 'store' ]);
Route::get('/articles/{id}', [App\Http\Controllers\Api\ArticleController::class, 'show' ]);
Route::put('/articles/{id}', [App\Http\Controllers\Api\ArticleController::class, 'update' ]);
Route::delete('/articles/{id}', [App\Http\Controllers\Api\ArticleController::class, 'destroy' ]);

Route::get('/discovers', [App\Http\Controllers\Api\DiscoverController::class, 'index' ]);
Route::post('/discovers', [App\Http\Controllers\Api\DiscoverController::class, 'store' ]);
Route::get('/discovers/{id}', [App\Http\Controllers\Api\DiscoverController::class, 'show' ]);
Route::put('/discovers/{id}', [App\Http\Controllers\Api\DiscoverController::class, 'update' ]);
Route::delete('/discovers/{id}', [App\Http\Controllers\Api\DiscoverController::class, 'destroy' ]);

Route::get('/data', [App\Http\Controllers\Api\DataController::class, 'index' ]);
Route::post('/data', [App\Http\Controllers\Api\DataController::class, 'store' ]);
Route::get('/data/{id}', [App\Http\Controllers\Api\DataController::class, 'show' ]);
Route::put('/data/{id}', [App\Http\Controllers\Api\DataController::class, 'update' ]);
Route::delete('/data/{id}', [App\Http\Controllers\Api\DataController::class, 'destroy' ]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});