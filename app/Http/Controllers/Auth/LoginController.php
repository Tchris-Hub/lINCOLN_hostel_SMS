<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    /**
     * The maximum number of attempts to allow.
     *
     * @var int
     */
    protected $maxAttempts = 5;

    /**
     * The number of minutes to delay further attempts.
     *
     * @var int
     */
    protected $decayMinutes = 1;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Universal logout for both admin (web) and student
     */
    public function logout(Request $request)
    {
        // Log out both guards if authenticated
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        if (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
