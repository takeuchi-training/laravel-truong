<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\BlogPost;
use App\Models\User;
use App\Services\MyTestService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

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

        Route::prefix('/new')->name('.new')->middleware('auth')->group(function () {
            Route::get('/', 'create')->name('.create');
            Route::post('/', 'store')->name('.store')->middleware('test');
        });
        
        Route::prefix('/{post}')->name('.post')->group(function () {
            Route::get('/', 'show')->name('.show');
            Route::get('/edit', 'edit')->name('.edit')->middleware(['auth']);
            Route::put('/edit', 'update')->name('.update')->middleware(['auth']);
            Route::delete('/', 'destroy')->name('.destroy')->middleware(['auth']);
        });
});

Route::get('/test-redirect', function () {
    return redirect()
        ->route('blog.post.show', ['post' => 19])
        ->with("testMessage", "Test Message");
});

Route::get('/test-response', function () {
    return response("Hello Response!", 200);
});

// Test cookie
Route::get('/set-cookie', function (Request $request) {
    $minutes = 60;
    $response = new Response('Set Cookie');
    $response->withCookie(cookie('name', 'My Cookie', $minutes));
    return $response;
});

Route::get('/get-cookie', function (Request $request) {
    return dd($request->cookie('name'));
})->middleware('auth');

// Test session
Route::get('/set-sessions', function (Request $request) {
    Session::put('ssTest', "My Session");
    session(['newSession' => "My Another Session"]);
    return "Set session";
});

Route::get('/get-sessions', function (Request $request) {
    return dd(session()->all());
});

Route::get('/get-session-id', function (Request $request) {
    return dd(session()->getId());
});

Route::get('/regenerate-session-id', function () {
    session()->regenerate();
    return redirect('/get-session-id');
});

Route::get('/invalidate-session', function () {
    session()->invalidate();
    return redirect('/get-session-id');
});

Route::get('/flash-session', function() {
    // session()->flash('temp', 'Temp value');
    return session('temp');
});

Route::get('/flush-sessions', function () {
    session()->flush();
    return redirect('/get-sessions');
});

// Test response()->file(...) to read file
Route::get('/files/{file}', [FileController::class, 'show']);

// Test previous URL
Route::get('/test-url', function(Request $request) {
    return dd(URL::to('/'));
});

// Test sign URL and validate signed URL
Route::get('/blog-signed-url/{post}', function(Request $request, BlogPost $post) {
    if ($request->hasValidSignature()) {
        return view('blog.show', [
            'post' => $post
        ]);
    }

    return redirect()->route('blog.index');
})->name('blogSigned');

Route::get('/create-blog-signed-url/{post}', function(BlogPost $post) {
    return URL::temporarySignedRoute(
        'blogSigned', now()->addMinutes(15), ['post' => $post]
    );
});

// User route
Route::prefix('/users')
    ->controller(UserController::class)
    ->name('users')
    ->group(function() {
        Route::get('/', 'index')->name('.index');
        
        Route::prefix('/new')->group(function() {
            Route::get('/', 'create')->name('create');
            Route::post('/', 'store')->name('store');
        });
            
});

Route::get('/user-resource/{id}', function ($id) {
    return new UserResource(User::findOrFail($id));
});

Route::get('/user-collection', function () {
    // return new UserCollection(User::paginate());
    return UserResource::collection(User::all())->additional(['test' => 'abc']);
});

Route::controller(LoginController::class)->name('auth')->middleware('guest')->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('authenticate');
});

Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth');

Route::prefix('/blog/{post}/comments')
        ->controller(CommentController::class)
        ->middleware('auth')
        ->name('post.comments')
        ->group(function () {
    Route::post('/', 'storeParentComment')->name('.storeParentComment');

    Route::prefix('/{comment}')->name('.comment')->group(function() {
        Route::post('/', 'storeChildComment')->name('.storeChildComment');
        Route::get('/', 'edit')->name('.edit');
        Route::put('/', 'update')->name('.update');
        Route::delete('/', 'destroy')->name('.destroy');
    });
});




Route::get('/test', function () {
    
});