<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\BlogPostController;
use App\Services\MyTestService;

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
    return redirect('/blog');
});

Route::get('/test', function (Request $request) {
    return dd(response("Hello World"));
});

Route::get('/files', [FileController::class, 'index']);

Route::get('/files/new', [FileController::class, 'create']);

Route::post('/files/new', [FileController::class, 'store']);

Route::delete('/files/{file}/delete', [FileController::class, 'destroy'])
    ->middleware('web');

Route::prefix('/blog')
    ->controller(BlogPostController::class)
    ->name('blog')
    ->group(function () {
        Route::get('/', 'index')->name('.index');

        Route::prefix('/new')->name('.new')->group(function () {
            Route::get('/', 'create')->name('.create');
            Route::post('/', 'store')->name('.store')->middleware('test');
        });
        
        Route::prefix('/{post}')->name('.post')->group(function () {
            Route::get('/', 'show')->name('.show');
            Route::get('/edit', 'edit')->name('.edit');
            Route::put('/edit', 'update')->name('.update');
            Route::delete('/', 'destroy')->name('.destroy');
        });
});

Route::get('/test-redirect', function () {
    return redirect()
        ->route('blog.post.show', ['post' => 19])
        ->with("testMessage", "Test Message");
});