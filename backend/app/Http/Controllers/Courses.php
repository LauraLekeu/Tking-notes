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

    public function add(Request $request) {
        $course = new Course();
        $course->name = $request->name;
        $course->user_id = $request->user;
        $course->save();
        return response()->json([
            'status' => 200,
            'message' => 'Ok',
            'course' => $course
        ]);
    }

    public function delete(Request $request) {
        $cours = Course::find($request->id);
        $cours->delete();
        return $cours;
    }
}
