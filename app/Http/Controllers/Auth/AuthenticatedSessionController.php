<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $url = '';
        
        if($request->user()->role === 'Admin')
        {
            $url = '/admin/dashboard';
        } 
        elseif($request->user()->role === 'Teacher')
        {
            $url = '/teacher/dashboard';
        }
        elseif($request->user()->role === 'Student')
        {
            $url = '/dashboard';
        }
        elseif($request->user()->role === 'Parent')
        {
            $url = '/parent/dashboard';
        }

        $notification = array(
            'message' => $request->user()->role.' '. 'Login Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->intended($url)->with($notification);
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
}
