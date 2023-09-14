<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('admin.login');
    }

    public function authenticate(AuthenticateRequest $request) {
        $data = $request->only('email', 'password');

        $remember = $request->input('remember', false);

        if(Auth::attempt($data, $remember)){
            return redirect(route('admin'));
        } else {
            return redirect(route('login'))->with('error', 'E-mail e/ou senha errado');
        }

        
    }

    public function logout() {
        Auth::logout();

        return redirect(route('login'));
    }
}
