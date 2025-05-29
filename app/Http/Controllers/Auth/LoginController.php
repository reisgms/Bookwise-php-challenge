<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $user = User::whereEmail($request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'credentials' => 'The provided credentials do not match our records.',
            ]);
        }

        if (!password_verify($request->password, $user->password)) {
            return back()->withErrors([
                'credentials' => 'The provided credentials do not match our records.',
            ]);
        }
        
        Auth::login($user);
        return to_route('books.index')->with('success', 'Login successful');
    }
}
