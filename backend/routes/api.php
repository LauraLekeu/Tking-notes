<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Courses;
use App\Http\Controllers\Notes;
use App\Http\Controllers\Todos;
use App\Http\Controllers\Tags;

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


Route::get('courses', [Courses::class, 'index'] );
// Add
Route::post('/addCourse', [Courses::class, 'add']);

Route::post('/deleteCourses', [Courses::class, 'delete']);

Route::get('notes', [Notes::class, 'index'] );
// Add
Route::post('/addNotes', [Notes::class, 'add']);

Route::post('/editNotes', [Notes::class, 'edit']);

Route::post('/deleteNotes', [Notes::class, 'delete']);

Route::get('todos', [Todos::class, 'index'] );
// Add
Route::post('/addTodos', [Todos::class, 'add']);

Route::post('/deleteTodos', [Todos::class, 'delete']);

Route::get('tags', [Tags::class, 'index'] );