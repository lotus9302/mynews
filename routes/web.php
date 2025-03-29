<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
    Route::get('news', 'index')->name('news.index');
    Route::get('news/edit', 'edit')->name('news.edit');
    Route::post('news/edit', 'update')->name('news.update');
    Route::get('news/delete', 'delete')->name('news.delete');
}); 

Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('profile/create', 'add')->name('profile.add');
    Route::post('profile/create', 'create')->name('profile.create');
    Route::get('profile', 'index')->name('profile.index');
    Route::get('profile/edit', 'edit')->name('profile.edit');
    Route::post('profile/edit', 'update')->name('profile.update');
    Route::get('profile/delete', 'delete')->name('profile.delete');
}); 


// Route::controller(BlogController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
//     Route::get('myblog/create', 'add')->name('myblog.add');
//     Route::post('myblog/create', 'create')->name('myblog.create');
//     Route::get('myblog', 'index')->name('myblog.index');
//     Route::get('myblog/edit', 'edit')->name('myblog.edit');
//     Route::post('myblog/edit', 'update')->name('myblog.update');
//     Route::get('myblog/delete', 'delete')->name('myblog.delete');
//     Route::get('myblog/show', 'show')->name('myblog.show');
// }); 
// Route::controller(AAAController::class)->group(function() {
//     Route::get('XXX/news/create', 'bbb');
// });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\NewsController as PublicNewsController;
Route::get('/', [PublicNewsController::class, 'index'])->name('news.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// use App\Http\Controllers\Admin\MyblogController;
// Route::controller(MyblogController::class)->prefix('admin')->group(function() {
//     Route::get('myblog/create', 'add');
//     Route::post('myblog/create', 'create')->name('myblog.create');
//     Route::get('myblog/edit', 'edit')->name('myblog.edit');
//     Route::get('myblog/index', 'index')->name('myblog.index'); 
// });

// Route::controller(AAAController::class)->prefix('admin')->group(function() {
//     Route::get('profile/create', 'bbb');
// });      
// Route::controller(Admin¥ProfileController::class)->prefix('admin')->group(function() {    
//     Route::get('profile/create', 'update');
// });

use App\Http\Controllers\ProfileController as PublicProfileController;
Route::get('/profile', [PublicProfileController::class, 'index'])->name('profile.index');