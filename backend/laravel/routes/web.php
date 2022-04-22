<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CanvasController;
use App\Http\Controllers\ArticleController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/chat', function () {
        return Inertia::render('Chat/container');
    })->name('chat');
    Route::get('/canvas', function () {
        return Inertia::render('Canvas/container');
    })->name('canvas');
    Route::get('/article', function () {
        return Inertia::render('Article/container');
    })->name('article');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('article')->group(function () {
        Route::get('/index', [ArticleController::class, 'articles']);
        Route::get('/user', [ArticleController::class, 'myArticles']);
        Route::get('/{articleId}', [ArticleController::class, 'show']);
    });
    Route::prefix('chat')->group(function () {
        Route::get('/rooms', [ChatController::class, 'rooms']);
        Route::get('/room/{roomId}/messages', [ChatController::class, 'messages']);
        Route::post('/room/{roomId}/messages', [ChatController::class, 'newMessage']);
    });
    Route::prefix('canvas')->group(function () {
        Route::get('rooms', [CanvasController::class, 'rooms']);
        Route::get('room/{roomId}/history', [CanvasController::class, 'history']);
        Route::post('room', [CanvasController::class, 'createRoom']);
        Route::post('room/{roomId}/history', [CanvasController::class, 'updateHistory']);
    });
});
