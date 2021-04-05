<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Models\User;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('addProduct', [ApiController::class, 'addProduct']);
Route::get('getProduct', [ApiController::class, 'getProduct']);
Route::get('editProduct/{id}', [ApiController::class, 'editProduct']);
Route::patch('updateProduct/{id}', [ApiController::class, 'UpdateProduct']);
Route::delete('deleteProduct/{id}', [ApiController::class, 'deleteProduct']);
Route::get('user',function(){
    User::create([
        "name"=>'test',
        'email'=>"test@gmail.com",
        'password'=>"pass",
    ]);
    return User::all();
});
