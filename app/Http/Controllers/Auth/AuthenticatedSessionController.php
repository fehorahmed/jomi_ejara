<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }



    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();
        if (auth()->user()->is_admin == 1) {
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function userLoginCreate(): View
    {
        return view('frontend.pages.login_form');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function userLoginPost(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();
        if (auth()->user()->is_admin == 1) {
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

    public function userRegisterCreate(): View
    {
        return view('frontend.pages.register_form');
    }
    public function userRegisterPost(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            "email" => "required|email|unique:users,email",
            "nid" => "required|string|unique:users,email",
            "phone" => "required|string|unique:users,email",
            "password" => "required|string|confirmed",

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->nidno = $request->nid;
        $user->password = Hash::make($request->password);
        $user->status = 1;
        $user->save();
        return redirect()->route('user.login')->with('success', 'Registration successfull. Please Login.');
    }
    public function userLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
