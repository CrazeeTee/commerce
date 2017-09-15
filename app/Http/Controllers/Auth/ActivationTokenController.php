<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\ActivationToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\UserRequestActivationEmail;

class ActivationTokenController extends Controller
{
    public function activate(ActivationToken $token)
    {
        $token->user()->update([ 'active' => true ]);

        $this->guard()->login($token->user);

        $token->delete();

        return redirect()->route('user.index')->with('success', 'Email verified. Thank you');
    }

    public function resend(Request $request)
    {
        $user = User::byEmail($request->email);

        if ($user->active):
            return redirect()->route('login')->with('info', 'Already verified.');
        endif;

        event(new UserRequestActivationEmail($user));

        return redirect()->route('login')->with('info', 'Verification email resent.');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
