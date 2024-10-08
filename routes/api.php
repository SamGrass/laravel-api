<?php

use App\Http\Controllers\Api\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'index']);
Route::get('/types', [PageController::class, 'types']);
Route::get('/technologies', [PageController::class, 'technologies']);
Route::get('/projectBySlug/{slug}', [PageController::class, 'projectBySlug']);
