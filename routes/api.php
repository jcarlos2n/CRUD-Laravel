<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function(){
    return 'bienvenido a mi app';
});

Route::get('/users', [UserController::class, 'getAllUsers']);

Route::get('/users/{id}', [UserController::class, 'getUserById']);

Route::post('/users', [UserController::class, 'createUser']);

Route::put('/users/{id}', [UserController::class, 'updateUser']);

Route::delete('/users/{id}', [UserController::class, 'deleteUser']);

//TASKS
Route::get('/tasks', [TaskController::class, 'getTask']);
Route::post('/tasks', [TaskController::class, 'postTask']);
Route::put('/tasks/{idtasks}', [TaskController::class, 'updateTask']);
Route::delete('/tasks/{idtasks}', [TaskController::class, 'deleteTask']);
