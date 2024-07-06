<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login(){
        $title = 'Halaman Login';
        return view('auth.login', [
            'title' => $title
        ]);
    }

    public function register()
    {
        $title = 'Halaman Register';
        return view('auth.register', [
            'title' => $title
        ]);
    }

    public function registerakun(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:250'],
            'email' => ['required', 'email', 'max:250', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed'],
            'role' => ['required'],
        ]);

        User::create($validatedData);

        return back()
            ->withSuccess('You have successfully registered');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Your provided credentials do not match in our records.',
            ]);
        }
            return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')
            ->withSuccess('You have logged out successfully!');
    }
}
