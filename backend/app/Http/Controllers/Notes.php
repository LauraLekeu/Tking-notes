<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\DB;

class Notes extends Controller
{
    //
    public function index(Request $request) {
        $notes = DB::table('notes')->where('user_id', $request->user_id)->orderBy('created_at', 'desc')->get();
        return response()->json($notes);
    }

    public function add(Request $request) {
        $note = new Note();
        $note->title = $request->title;
        $note->content = $request->content;
        $note->course_id = $request->course;
        $note->user_id = $request->user;
        $note->save();
        return response()->json([
            'status' => 200,
            'message' => 'Ok',
            'note' => $note
        ]);
    }

    public function edit(Request $request) {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln($request->title);
        $note = Note::find($request->id);
        $note->title = $request->title;
        $note->content = $request->content;
        $note->course_id = $request->course;
        $note->user_id = $request->user;
        $note->updated_at = NOW();
        $note->save();
        return response()->json([
            'status' => 200,
            'message' => 'Ok',
            'note' => $note
        ]);
    }

    public function delete(Request $request) {
        $note = Note::find($request->id);
        $note->delete();
        return $note;
    }
}
