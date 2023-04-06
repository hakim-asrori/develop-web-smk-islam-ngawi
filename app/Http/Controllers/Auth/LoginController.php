<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $loginRequest)
    {
        $user = $this->user->where('email', $loginRequest->email)->orWhere('nis', $loginRequest->email)->first();

        if (!$user) {
            return back()->with('message', "<script>Swal.fire('Ooops!', 'akun tidak terdaftar!', 'error');</script>")->withInput();
        }

        if (!Hash::check($loginRequest->password, $user->password)) {
            return back()->with('message', "<script>Swal.fire('Ooops!', 'akun tidak terdaftar!', 'error');</script>")->withInput();
        }

        $loginRequest->session()->regenerate();

        if (Auth::attempt($loginRequest->validated())) {
            return redirect()->intended('app');
        }

        if (Auth::attempt([
            'nis' => $user->nis,
            'password' => $loginRequest->password
        ])) {
            return redirect()->intended('app');
        }
    }
}
