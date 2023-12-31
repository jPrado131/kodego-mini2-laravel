<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Counter;
use App\Livewire\RealTimeChat;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/upload/image', [ProfileController::class, 'index_pro_pic'])->name('profile.index_pro_pic');
    Route::post('/upload/image', [ProfileController::class, 'upload_pro_pic'])->name('upload.upload_pro_pic');

    Route::get('/home', [PostController::class, 'index'])->name('post.index');
    Route::put('/home', [PostController::class, 'create_put'])->name('post.create_put');
    Route::get('/events', [PostController::class, 'list_event'])->name('post.list_event');
    Route::get('/announcements', [PostController::class, 'list_announcements'])->name('post.list_announcements');

    Route::get('/post/create', [PostController::class, 'create_get'])->name('post.create_get');
    Route::get('/post/{post_id}/edit', [PostController::class, 'edit_get'])->name('post.edit_get');


    Route::get('/post/{post_id}', [PostController::class, 'single'])->name('post.single');
    Route::put('/post/{post_id}', [PostController::class, 'edit_put'])->name('post.edit_put');
    Route::delete('/post/{post_id}', [PostController::class, 'delete'])->name('post.delete');
    Route::post('/post/{post_id}', [PostController::class, 'single'])->name('post.comment');
});

Auth::routes();

// PUBLIC ROUTES
Route::get('/counter', Counter::class);

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');
