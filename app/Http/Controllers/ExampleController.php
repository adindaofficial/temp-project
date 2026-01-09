<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
    public function tambahCaptcha_client(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt(Str::random(12)),
        ]);
        return back()->with('success', 'User added successfully.');
    }
    public function tambahCaptcha_client_server(Request $request)
    {
        // Mengirim permintaan verifikasi CAPTCHA ke Cloudflare
        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => env('CLOUDFLARE_TURNSTILE_SECRET_KEY'),
            'response' => $request->input('cf-turnstile-response'),
            'remoteip' => $request->ip(),
        ])->json();

        if (!isset($response['success']) || !$response['success']) {
            // Verifikasi gagal, tampilkan pesan kesalahan dan kirim status danger
            return back()->withErrors([
                'cf-turnstile-response' => 'Verifikasi CAPTCHA gagal. Silakan coba lagi.'
            ])->with('danger', 'Verifikasi CAPTCHA gagal. Silakan coba lagi.');
        }

        // Jika CAPTCHA berhasil, lanjutkan dengan pembuatan user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt(Str::random(12)),
        ]);

        // Kembalikan dengan pesan sukses setelah pembuatan user
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
