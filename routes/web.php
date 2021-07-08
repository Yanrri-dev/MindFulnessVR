<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SceneController;
use App\Http\Controllers\QuestionController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/escenas', [SceneController::class, 'index'] )->name('scenes');
Route::middleware(['auth:sanctum', 'verified'])->get('/escenas/{scene}/play', [SceneController::class, 'show'] )->name('scene.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/escenas/{scene}/{type}', [QuestionController::class, 'index'] )->name('questions.index');
Route::middleware(['auth:sanctum', 'verified'])->post('/escenas/{scene}/{type}', [QuestionController::class, 'store'] )->name('questions.store');

