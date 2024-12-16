<?php


use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/', 'home.index')->name('home');

Route::redirect('/home', '/')->name('home.redirect');


Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'store'])->name('login.store');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});

Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('blog/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::post('blog/{post}/like', [BlogController::class, 'like'])->name('blog.like');

Route::resource('posts/{post}/comments', CommentController::class)->only([
    'index', 'show',
]);


Route::get('blog',[BlogController::class,'index'])->name('blog');
Route::post('blog/{post}',[BlogController::class,'show'])->name('blog.like');
Route::post('blog/{post}/like',[BlogController::class,'index'])->name('blog.like');

Route::prefix('admin')->middleware('auth', 'active', 'admin')->group(function () {
    Route::redirect('/', '/admin/posts')->name('admin');

    Route::get('posts', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.posts');
    Route::get('posts/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.posts.create');
    Route::post('posts', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.posts.store');
    Route::get('posts/{post}', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('admin.posts.show');
    Route::get('posts/{post}/edit', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('posts/{post}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('posts/{post}', [App\Http\Controllers\Admin\PostController::class, 'delete'])->name('admin.posts.delete');
    Route::put('posts/{post}/like', [App\Http\Controllers\Admin\PostController::class, 'like'])->name('admin.posts.like');
});

Route::prefix('user')->group(function () {
    Route::redirect('/', '/user/posts')->name('user');

    Route::get('posts', [PostController::class, 'index'])->name('user.posts');
    Route::get('posts/create', [PostController::class, 'create'])->name('user.posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('user.posts.store');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('user.posts.show')->whereNumber('post');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('user.posts.edit')->whereNumber('post');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('user.posts.update')->whereNumber('post');
    Route::delete('posts/{post}', [PostController::class, 'delete'])->name('user.posts.delete')->whereNumber('post');

  //  Route::get('donates', DonateController::class)->name('user.donates');
});


Route::get('/test', function () {
    return view('test',['name' => 'Vladimir Ostrovskiy']);
});

Route::get('/page', function () {
    return view('page');
});






Route::get('/user/{id}', [UserController::class, 'show']);


///Route::get('/page')
