<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostCRUDController;
use App\Http\Controllers\HomeCRUDController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
 
Route::resource('products', ProductController::class);

Route::resource('posts', PostCRUDController::class);


//templete
// Route::get('/home', function () {
//     return view('page/index');
// })->name('index');
Route::get('/', [HomeCRUDController::class, 'index'])->name('index');
Route::get('/show/{id}', [HomeCRUDController::class, 'show'])->name('show');

// Route::resource('index', HomeuctController::class);

Route::get('/404', function () {
    return view('page/404');
})->name('404');

Route::get('/blog-single', function () {
    return view('page/blog-single');
})->name('blog-single');

Route::get('/blog', function () {
    return view('page/blog');
})->name('blog');

Route::get('/profile', function () {
    return view('page/profile');
})->name('profile');

Route::get('/checkout', function () {
    return view('page/checkout');
})->name('checkout');

Route::get('/contact-us', function () {
    return view('page/contact-us');
})->name('contact-us');

// Route::get('/login', function () {
//     return view('page/login');
// })->name('login');

// Route::get('/post', function () {
//     return view('page/product-details');
// })->name('product-details');

Route::get('/shop', function () {
    return view('page/shop');
})->name('shop');

Route::get('/welcome', function () {
    return view('page/welcome');
})->name('welcome');

// Route::get('/register', function () {
//     return view('page/register');
// })->name('register');

Route::get('/templete', function () {
    return view('templete/templete');
});

Route::get('/test', function () {
    return view('templete/test');
})->name('test');

Route::get('/chat', function () {
    return view('page/chat');
})->name('chat');

Route::get('/alert', function () {
    return view('page/alert');
})->name('alert');

// Route::get('/showpost', function () {
//     return view('page/showpost');
// })->name('showpost');

// Route::post('post', [PostController::class, 'store'])->name('post.store');
// Route::get('post', [PostController::class, 'create'])->name('post.create');
// // Route::get('/postss', [PostController::class, 'index'])->name('posts');
// Route::get('/postsytem', [PostController::class, 'index'])->name('post.index');
// Route::get('/article/{post:slug}', [PostController::class, 'show'])->name('post.show');

// // Route::get('/article/{post:slug}', [PostController::class, 'show'])->name('post.show');
// Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.add');
// Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');




Route::get('post', [PostController::class, 'create'])->name('post.create');
Route::post('post', [PostController::class, 'store'])->name('post.store');
Route::get('/postsytem', [PostController::class, 'index'])->name('post.index');
Route::get('/article/{post:slug}', [PostController::class, 'show'])->name('post.show');

Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.add');
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');




  

