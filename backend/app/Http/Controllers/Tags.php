<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class Tags extends Controller
{
    //
    public function index() {
        return response()->json(Tag::all());
    }
}
