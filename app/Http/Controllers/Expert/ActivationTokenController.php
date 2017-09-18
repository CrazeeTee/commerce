<?php

namespace App\Http\Controllers\Expert;

use App\Expert;
use App\ActivationToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\ExpertRequestActivationEmail;

class ActivationTokenController extends Controller
{
    public function activate(ActivationToken $token)
    {
        $token->expert()->update([ 'active' => true ]);

        $this->guard()->login($token->expert);

        $token->delete();

        return redirect()->route('expert.index')->with('success', 'Email verified. Thank you');
    }

    public function resend(Request $request)
    {
        $expert = Expert::byEmail($request->email);

        if ($expert->active):
            return redirect()->route('expert.login')->with('info', 'Already verified.');
        endif;

        event(new ExpertRequestActivationEmail($expert));

        return redirect()->route('expert.login')->with('info', 'Verification email resent.');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('expert');
    }
}
