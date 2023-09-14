<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index() {
        return view('admin.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|min:4|confirmed',
            'password_confirmation'
        ]);

        $data = $request->only([
            'name', 
            'email', 
            'password'
        ]);

        $user = User::create($data);
        Auth::login($user);

        return redirect(route('admin'));
    }
}
