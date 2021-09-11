<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class Todos extends Controller
{
    //
    public function index() {
        return response()->json(Todo::all());
    }

    public function add(Request $request) {
        $todo = new Todo();
        $todo->content = $request->content;
        $todo->deadline = $request->deadline;
        $todo->completed = $request->completed;
        $todo->course_id = $request->course;
        $todo->user_id = $request->user;
        $todo->save();
        return response()->json([
            'status' => 200,
            'message' => 'Ok'
        ]);
    }
}
