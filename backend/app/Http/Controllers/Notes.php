<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class Notes extends Controller
{
    //
    public function index() {
        return response()->json(Note::all());
    }
}
