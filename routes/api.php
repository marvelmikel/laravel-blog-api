<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestControler;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FileUploadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('first-api', [TestControler::class, 'firstApi']);

Route::get('/get-blog/{id?}', [BlogController::class,'getBlog']);

Route::post('/add-blog', [BlogController::class,'addBlog']);
Route::put('/blog-update', [BlogController::class,'updateBlog']);

Route::delete('/delete-blog/{id}', [BlogController::class,'deleteBlog']);
Route::get('/search-data/{param}', [BlogController::class,'searchBlogByName']);
Route::post('/save-valid-blog', [BlogController::class,'validateData']);
Route::post('/file-upload', [FileUploadController::class,'fileUpload']);
