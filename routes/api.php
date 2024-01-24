<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\LeadController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/projects', [ProjectController::class, 'index']);
//Route::get('/projects/search', [ProjectController::class, 'search']);
Route::get('/projects/{project}', [ProjectController::class, 'show']);
Route::get('search/projects', [ProjectController::class, 'search'])->name('search.projects');
//Route::get('categories/projects', [ProjectController::class, 'searchByCategory']);

Route::post('contacts', [LeadController::class, 'store']);