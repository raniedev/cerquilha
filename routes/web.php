<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\LikeVideoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UsernameController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Video;

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

Route::get('/', function () {
    return view('welcome');
});

// Auth padrão do Laravel e páginas /dashboard e /profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// LAYOUT
Route::get('/home', [LayoutController::class, 'index'])->name('home');

// USERNAME
Route::get('user/{username}', [UsernameController::class, 'show'])->name('user.show');

// POSTS
Route::resource('/posts', PostController::class);

// QUESTIONS
Route::resource("/questions", QuestionController::class);

// VIDEOS
Route::resource("/videos", VideoController::class);
Route::post('/videos/comment', [VideoController::class, 'comment'])->name('videos.comment');

// FOLLOWERS
Route::resource('/followers', FollowerController::class);

// SEARCH
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/search/posts', [SearchController::class, 'posts'])->name('search.posts');
Route::get('/search/users', [SearchController::class, 'users'])->name('search.users');
Route::get('/search/videos', [SearchController::class, 'videos'])->name('search.videos');

// Layout
Route::post('/atualizar-layout/{id}', [LayoutController::class, 'update'])->name('atualizar-layout');

// Config
Route::resource("/configs", ConfigController::class);

// Admin
Route::resource("/admin", AdminController::class);

// Likes
Route::resource("/likes", LikeController::class);
Route::resource('/likes-video', LikeVideoController::class);

require __DIR__.'/auth.php';