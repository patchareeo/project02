<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostCRUDController;
use App\Http\Controllers\HomeCRUDController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\OrderController;

use App\Models\Post;
use App\Models\Alert;
use App\Models\orders;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $data['posts'] = Post::orderBy('id','desc')->paginate(5);
    // $countAlert = Alert::all()->count();
    $id = Auth::user()->id;
    $countAlert = Alert::where('orders_id',$id)->count();
   

    // dd( Auth::user());
    return view('page.home', $data)->with('countAlert' ,$countAlert);
    // return view('dashboard');
})->name('dashboard');
 
// Route::resource('products', ProductController::class);

Route::resource('posts', PostCRUDController::class);


//templete
// Route::get('/home', function () {
//     return view('page/index');
// })->name('index');

Route::get('/', [HomeCRUDController::class, 'index'])->name('index');
Route::get('/show/{id}', [HomeCRUDController::class, 'show'])->name('show');
Route::post('/show/{id}', [HomeCRUDController::class, 'store'])->name('page.showpost');
Route::get('/alert', [AlertController::class, 'index'])->name('page.alert');
Route::get('/sale', [HomeCRUDController::class, 'sale'])->name('page.sale');
Route::get('/cart', [HomeCRUDController::class, 'cart'])->name('page.cart');
Route::delete('/order/{id}', [HomeCRUDController::class, 'destroy'])->name('order.destroy');
// Route::get('status', [HomeCRUDController::class, 'status'])->name('alert.status');
Route::get('/search', [HomeCRUDController::class, 'search']);
Route::post('/autocomplete', [HomeCRUDController::class, 'searchProduct'])->name('autocomplete');



Route::get('/article/{post:slug}', [PostController::class, 'show'])->name('post.show');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () { });

Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.add');
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');
Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

// Route::get('/alert', function () {
//     return view('page/alert');
// })->name('alert');

// Route::resource('index', HomeuctController::class);

Route::get('/404', function () {
    return view('page/404');
})->name('404');

Route::get('/product-details', function () {
    return view('page/product-details');
})->name('product-details');

Route::get('/create', function () {
    return view('page/create');
})->name('create');

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

// Route::get('/cart', function () {
//     return view('page/cart');
// })->name('cart');

// Route::get('/sale', function () {
//     return view('page/sale');
// })->name('sale');



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




// Route::get('post', [PostController::class, 'create'])->name('post.create');
// Route::post('post', [PostController::class, 'store'])->name('post.store');
// Route::get('/postsytem', [PostController::class, 'index'])->name('post.index');





  

