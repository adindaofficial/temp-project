<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        $user = User::all();
        $user_count = $user->count();
        return view('frontend.user.index', compact('user', 'user_count'));
    }
    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
