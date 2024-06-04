<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PostController::class, 'indexguest'])->name('welcome');

Route::get('/home', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::view('/newpost', 'newpost')-> name('newpost');
Route::get('/adminonly', [PostController::class, 'indexadmin'])-> name('adminonly');
// Route::view('/registerme', 'register')-> name('registerme');

Route::post('/submit_post', [PostController::class, 'store'])->name('submit_post');
Route::get('/delete_post/{id}', [PostController::class, 'delete'])->name('delete_post');

Route::get('/edit_post/{id}', [PostController::class, 'edit'])->name('edit_post');
Route::post('/updat_post', [PostController::class, 'update'])->name('update_post');

Route::get('/like_post/{id}', [PostController::class, 'like'])->name('like_post');
// Route::get('/comment_post/{id}', [PostController::class, 'like'])->name('like_post');
Route::get('/comment_post/{id}', [PostController::class, 'viewpost'])->name('comment_post');
Route::post('/save_comment', [PostController::class, 'savecomment'])->name('save_comment');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// Route::get('/welcome', [ProController::class, 'index'])-> name('welcome');



// Route::post('/createprofile', [ProController::class, 'create'])->name('createprofile');
