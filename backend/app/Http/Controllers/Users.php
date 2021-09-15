<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Users extends Controller
{
    public function index(Request $request) {
        $user = User::find($request->id);
        
        return response()->json([
            'user' => $user
        ]);
    }
}
