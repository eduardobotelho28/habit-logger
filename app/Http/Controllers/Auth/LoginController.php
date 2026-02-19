<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    
class LoginController extends Controller
{
    
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');
 
        // $credentials = $request->validate([
        //     'email'    => ['required', 'email']     ,
        //     'password' => ['required', 'min:6']     ,
        // ]); 
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'credentialsError' => 'As credenciais fornecidas estão incorretas.',
        ]);

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('home'));
    }

}
