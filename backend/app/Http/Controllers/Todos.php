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
}
