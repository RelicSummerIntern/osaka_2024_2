<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');



// Route::get('/post/index', [PostController::class, 'index'])->name('post.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/mypage',function(){
        return view('mypage');
    
    })->name('mypage');
    
    //コミュニティ画面に入る
    Route::get('/community/{id}', [CommsController::class, 'visit'])->name('comms.visit');

    Route::get('/myposts', [PostController::class, 'myPosts'])->name('myposts');
});

// 登録後のマイページへのルート

// Route::get('/mypage',function(){
//     return view('mypage');

// })->name('mypage');

// カレンダーのイベントなどのデータベースを引っ張るもの（仮）

Route::get('/fetch-events', function() {
    $events = DB::table('events')->select('id', 'title', 'start', 'end')->get();
    return response()->json($events);
});


require __DIR__.'/auth.php';

