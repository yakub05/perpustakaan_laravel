<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserLoginRequest;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            alert()->success('Anda Berhasil Login !', 'Hai Silahkan Memilih Buku');
            return redirect()->intended('/');
        }
        $request->session()->regenerate();
        alert()->error('Anda Berhasil Login !', 'Hai Silahkan Memilih Buku');
        return redirect()->intended('/login');
    }
    public function register(UserCreateRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['password'] = bcrypt($validated['password']);
            User::create($validated);
            return redirect(route('login'))->with('flash', [
                'error' => false,
                'msg' => 'Account registered, please login to continue.'
            ]);
        } catch (\Exception $e) {
            report($e);
            return redirect(route('login'))->withInput()->with('flash', [
                'error' => true,
                'msg' => 'Failed to register an account.'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
