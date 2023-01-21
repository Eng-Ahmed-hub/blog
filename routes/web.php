<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


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
//================Route Posts===============================================
//==========================================================================
//==================Select Posts============================================
Route::get('posts',[PostController::class,'index']);
Route::get('post/show/{id}',[PostController::class,'show']);
//==========================================================================
//===================Insert Posts===========================================
Route::get('post/create',[PostController::class,'create']);
Route::post('post',[PostController::class,'store']);
//==========================================================================
//==================Edit Post===============================================
Route::get('post/edit/{id}',[PostController::class,'edit']);
Route::put('post/update/{id}',[PostController::class,'update']);
//===========================================================================
//=====================Delete Post===========================================
Route::delete('post/delete/{id}',[PostController::class,'destroy']);
//============================================================================
//=================== Route comments =========================================
//============================================================================
//======================== Select comments ===================================
Route::get('comments',[CommentController::class,'index']);
Route::get('comment/show/{id}',[CommentController::class,'show']);
//==========================================================================
//===================Insert comments========================================
Route::get('comment/create',[CommentController::class,'create']);
Route::post('comment',[CommentController::class,'store']);
//==========================================================================
//==================Edit comments===========================================
Route::get('comment/edit/{id}',[CommentController::class,'edit']);
Route::put('comment/update/{id}',[CommentController::class,'update']);
//===========================================================================
//=====================Delete comments=======================================
Route::delete('comment/delete/{id}',[CommentController::class,'destroy']);
