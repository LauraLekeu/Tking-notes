<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Courses;
use App\Http\Controllers\Notes;
use App\Http\Controllers\Todos;
use App\Http\Controllers\Tags;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Search;
use App\Http\Controllers\Users;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user', [Users::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::get('courses', [Courses::class, 'index'] );
    // Add
    Route::post('/addCourse', [Courses::class, 'add']);

    Route::post('/editCourses', [Courses::class, 'edit']);
    
    Route::post('/deleteCourses', [Courses::class, 'delete']);
    
    Route::get('notes', [Notes::class, 'index'] );
    // Add
    Route::post('/addNotes', [Notes::class, 'add']);
    
    Route::post('/editNotes', [Notes::class, 'edit']);
    
    Route::post('/deleteNotes', [Notes::class, 'delete']);
    
    Route::get('todos', [Todos::class, 'index'] );
    // Add
    Route::post('/addTodos', [Todos::class, 'add']);

    Route::post('/editTodos', [Todos::class, 'edit']);
    
    Route::post('/deleteTodos', [Todos::class, 'delete']);
    
    Route::get('tags', [Tags::class, 'index'] );

    Route::get('/search', [Search::class, 'search']);
});