<?php

use App\Http\Controllers\commentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
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



// Route::get('/test', function () {
//     $testName = 'ahmedasdasdasdd';
//     $books = ['first book', 'second book'];

//     return view('test', [
//         'name' => $testName,
//          'age' => 23,
//          'books' => $books,
//     ]);
// });

Route::get('/', [PostController::class, 'index'])->name('comments.index')->middleware('auth');
Route::get('posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::get('posts/create',[PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update')->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/comments/{comment}', [commentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}/{postid}', [commentController::class, 'destroy'])->name('comments.destroy');
Route::put('/comments/{comment}/{postid}',[commentController::class,'update'])->name('comments.update')->middleware('auth');


Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('loginGithub');
 

Route::get('/auth/callback/Github', function () {
    $githubUser = Socialite::driver('github')->user();
 
    $user = User::updateOrCreate([
        'email' =>  $githubUser->email,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);
 
    Auth::login($user);
 
    return redirect('/posts');
});





Route::get('/auth/redirect/google', function () {
    
    return   Socialite::driver('google')->redirect();
  
});
 

Route::get('/auth/callback/google', function () {
    $googleUser = Socialite::driver('Google')->user();
 
    $user = User::updateOrCreate([
        'email' =>  $googleUser->email,
    ], [
        'name' => $googleUser->name,
        'email' => $googleUser->email,
        'google_token' => $googleUser->token,
        'google_refresh_token' => $googleUser->refreshToken,
    ]);
 
    Auth::login($user);
 
    return redirect('/posts');
});