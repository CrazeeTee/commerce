<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\ActivationToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\AdminRequestActivationEmail;

class ActivationTokenController extends Controller
{
    public function activate(ActivationToken $token)
    {
        $token->admin()->update([ 'active' => true ]);

        $this->guard()->login($token->admin);

        $token->delete();

        if (!$token->admin->isAdmin()):
            return redirect()->route('moderator.index')->with('success', 'Email verified and activated. Thank you');
        endif;

        return redirect()->route('admin.index')->with('success', 'Email verified and activated. Thank you');
    }

    public function resend(Request $request)
    {
        $admin = Admin::byEmail($request->email);

        if ($admin->active):
            return redirect()->route('admin.login')->with('info', 'Already verified');
        endif;

        event(new AdminRequestActivationEmail($admin));

        return redirect()->route('admin.login')->with('info', 'Verification email resent.');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
