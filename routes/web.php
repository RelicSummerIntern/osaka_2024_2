<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommsController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommEventsController;

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
    
    // マイページ
    Route::get('/mypage', [HomeController::class, 'index'])->name('mypage');


    // カレンダーのイベントなどのデータベースを引っ張るもの（仮）
    Route::get('/fetch-events', function() {
        $events = DB::table('events')->select('id', 'title', 'start', 'end')->get();
        return response()->json($events);
    });


});

Route::middleware('auth')->group(function () {
    //======コミュニティ一覧まわりのルート======
    //コミュニティ一覧のページ表示
    Route::get('/community', [CommsController::class, 'index'])->name('comms.index');
    //コミュニティに入るとき、そのユーザがコミュニティに属しているか確認（基本的にはこちらを呼び出す）
    Route::get('/community/{comm_id}/enter', [CommsController::class, 'enter'])->name('comms.enter');
    // コミュニティの詳細ページへ直接移動（comms.enterで呼び出す）
    Route::get('/community/{comm_id}', [CommunityController::class, 'index'])->name('community.index');
});

//イベント一覧、作成のルート
Route::get('/fetch-events', [CommEventsController::class, 'index']);
Route::post('/create-event', [CommEventsController::class, 'create']);

//イベント詳細のルート
Route::get('/events/{id}', [CommEventsController::class, 'show']);

require __DIR__.'/auth.php';

