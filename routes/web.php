<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionControler;
use App\Http\Controllers\SubscriptionController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;

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



Route::get('/', [PostController::class, 'index'])->name('Home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);
// Route::post('/posts/{post:slug}', [PostController::class, 'update']);


Route::post('/posts/{post:slug}/comments', [PostCommentController::class, 'store']);
Route::post('/posts/{post:slug}/likes', [PostCommentController::class, 'updateLikes']);

Route::post('/author/subscription/', [SubscriptionController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('newsletter', NewsletterController::class);

Route::get('login', [SessionControler::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionControler::class, 'store'])->middleware('guest');

Route::post('logout', [SessionControler::class, 'destroy'])->middleware('auth');



// Route::delete('users/{id}', function ($id) {
// });

Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class);
});
