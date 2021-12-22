<?php

use App\Http\Controllers\RepositoryController;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::get('repos', [RepositoryController::class, 'repos']);

Route::get('repo/{slug}', [RepositoryController::class, 'repo']);

Route::get('repo/content/{slug}/{path}', [RepositoryController::class, 'content']);
