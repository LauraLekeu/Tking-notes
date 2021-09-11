<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\DB;

class Notes extends Controller
{
    //
    public function index() {
        // $notes = Note::all();
        // $notesTags = [];
        // foreach ($notes as $note) {
        //     foreach ($note->tags as $tag) {
        //         return $tag->name;
        //     };
        // }
        // foreach ($notes as $note) {
        //     $noteId = $note['id'];
        //     $notes = Note::whereHas('tags', function($q) use($noteId) {
        //         $q->whereIn('note_id', $noteId);
        //     })->get();
        // }
        // return DB::table('notes_has_tags')->get();
         return response()->json(Note::all());
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
}
