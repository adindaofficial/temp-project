<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExampleController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('frontend.user.index', compact('user'));
    }
    public function show($id)
    {
        // Kode ini rentan terhadap SQL Injection
        $user = DB::select("SELECT * FROM users WHERE id = $id");

        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
