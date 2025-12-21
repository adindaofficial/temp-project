<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function reset(Request $request)
    {
        User::truncate();
        return response()->json(['message' => 'User data has been reset successfully.'], 200);
    }
}
