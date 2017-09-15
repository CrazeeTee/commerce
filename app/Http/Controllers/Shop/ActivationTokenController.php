<?php

namespace App\Http\Controllers\Shop;

use App\Shop;
use App\ActivationToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\ShopRequestActivationEmail;

class ActivationTokenController extends Controller
{
    public function activate(ActivationToken $token)
    {
        $token->shop()->update([ 'active' => true ]);

        $this->guard()->login($token->shop);

        $token->delete();

        return redirect()->route('shop.index')->with('success', 'Email verified. Thank you.');
    }

    public function resend(Request $request)
    {
        $shop = Shop::byEmail($request->email);

        if ($shop->active):
            return redirect()->route('shop.login')->with('info', 'Already verified');
        endif;

        event(new ShopRequestActivationEmail($shop));

        return redirect()->route('shop.login')->with('info', 'Verification email resent.');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('shop');
    }
}
