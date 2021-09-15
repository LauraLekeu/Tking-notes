<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Courses extends Controller
{
    //
    public function index(Request $request) {
        $courses = DB::table('courses')->where('user_id', $request->user_id)->orderBy('created_at', 'desc')->get();
        return response()->json($courses);
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

    public function edit(Request $request) {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln($request->title);
        $course = Course::find($request->id);
        $course->name = $request->name;
        $course->user_id = $request->user;
        $course->updated_at = NOW();
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
