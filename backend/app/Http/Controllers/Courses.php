<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class Courses extends Controller
{
    //
    public function index() {
        return response()->json(Course::all());
    }
}
