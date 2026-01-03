<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExampleController extends Controller
{
    public function index()
    {
        $user = User::all();
        $user_count = $user->count();
        return view('frontend.user.index', compact('user', 'user_count'));
    }
    public function tambah(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt(Str::random(12)),
        ]);
        return back()->with('success', 'User added successfully.');
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
    public function reset()
    {
        User::truncate();
        return back()->with('success', 'All users have been deleted.');
    }
}
