<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class Todos extends Controller
{
    //
    public function index() {
        // $todos = Todo::where('user_id', '=', $request->user_id)->get();
        // return response()->json($todos);
        return response()->json(Todo::All());
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
            'message' => 'Ok',
            'todo' => $todo
        ]);
    }

    public function edit(Request $request) {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln($request->title);
        $todo = Todo::find($request->id);
        $todo->completed = 1;
        $todo->updated_at = NOW();
        $todo->save();
        return response()->json([
            'status' => 200,
            'message' => 'Ok',
            'todo' => $todo
        ]);
    }

    public function delete(Request $request) {
        $todo = Todo::find($request->id);
        $todo->delete();
        return $todo;
    }
}
