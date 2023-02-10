<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\BrokerInterface;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Contracts\GuardInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Contracts\ViewPrefixInterface;
use Illuminate\Support\Facades\Password;

abstract class PasswordResetLinkController extends Controller implements
    BrokerInterface,
    ViewPrefixInterface
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view($this->getViewPrefix() . 'forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::broker($this->getBroker())->sendResetLink(
            $request->only('email')
        );
        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }
}
