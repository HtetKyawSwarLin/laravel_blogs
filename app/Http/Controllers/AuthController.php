<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {

        //validation
        $formData = request()->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'password' => ['required', 'min:8', 'max:255']
        ]);

        $user = User::create($formData);
        auth()->login($user);
        return redirect('/')->with('success', 'Welcome Dear, ' . $user->name);
    }


    public function login()
    {
        return view('auth.login');
    }

    public function post_login()
    {
        $formData = request()->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:8', 'max:255']
        ], [
            'email.required' => 'Need to fill email',
            'password.min:8' => 'Need to fill minimum 8'
        ]);

        if (auth()->attempt($formData)) {
            if (auth()->user()->is_admin) {
                return redirect('/admin/blogs')->with('success', 'Welcome Back Dear, ' . auth()->user()->name);
            } else {
                return redirect('/')->with('success', 'Welcome Back Dear, ' . auth()->user()->name);
            }
        } else {
            return redirect()->back()->withErrors(['email' => 'User Credential\'s Wrong']);
        }
    }
    public function logout()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Successfully Logout');
    }
}
