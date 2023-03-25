<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, "index"])->name("home");


Route::prefix('posts')->group(function () {
    Route::get('/add', [HomeController::class, "create_post"])->name("post.add");
    Route::get('/{slug}',[HomeController::class, "show"] )->name("post.show");
    Route::post('/store',[HomeController::class, "store"])->name("post.store");
    Route::get('/edit/{slug}', [homeController::class,"edit"])->name("post.edit");
    Route::put('/update/{id}', [homeController::class, "update"])->name("post.update");
    Route::delete('/delete/{id}', [homeController::class, "delete"])->name("post.delete");
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
