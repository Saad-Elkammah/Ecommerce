<?php

namespace App\Http\Controllers\SellerAuth;

use App\Http\Controllers\Auth\PasswordResetLinkController as AbstractPasswordResetLinkController;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends AbstractPasswordResetLinkController
{
    private $guard = 'seller';
    private $viewPrefix = 'sellers.';
    private $broker = 'sellers';
    /**
     * Display the password reset link request view.
     */
    // public function create(): View
    // {
    //     return view('auth.forgot-password');
    // }

    // /**
    //  * Handle an incoming password reset link request.
    //  *
    //  * @throws \Illuminate\Validation\ValidationException
    //  */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'email' => ['required', 'email'],
    //     ]);

    //     // We will send the password reset link to this user. Once we have attempted
    //     // to send the link, we will examine the response then see the message we
    //     // need to show to the user. Finally, we'll send out a proper response.
    //     $status = Password::sendResetLink(
    //         $request->only('email')
    //     );

    //     return $status == Password::RESET_LINK_SENT
    //                 ? back()->with('status', __($status))
    //                 : back()->withInput($request->only('email'))
    //                         ->withErrors(['email' => __($status)]);
    // }

    /**
     * Get the value of guard
     */
    public function getGuard()
    {
        return $this->guard;
    }

    /**
     * Set the value of guard
     *
     * @return  self
     */
    public function setGuard($guard)
    {
        $this->guard = $guard;

        return $this;
    }

    /**
     * Get the value of viewPrefix
     */
    public function getViewPrefix()
    {
        return $this->viewPrefix;
    }

    /**
     * Set the value of viewPrefix
     *
     * @return  self
     */
    public function setViewPrefix($viewPrefix)
    {
        $this->viewPrefix = $viewPrefix;

        return $this;
    }

    /**
     * Get the value of broker
     */
    public function getBroker()
    {
        return $this->broker;
    }

    /**
     * Set the value of broker
     *
     * @return  self
     */
    public function setBroker($broker)
    {
        $this->broker = $broker;

        return $this;
    }
}
