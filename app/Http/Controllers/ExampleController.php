<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        $user_count = User::count();
        $user = User::limit(1)->get();
        return response()->json([
            'message' => 'This is the user index route.',
            'total_users' => $user_count,
            'data' => $user
        ]);
    }
}
