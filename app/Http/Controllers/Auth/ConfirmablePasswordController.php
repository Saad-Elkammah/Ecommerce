<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\GuardInterface;
use App\Contracts\RoutePrefixInterface;
use App\Contracts\ViewPrefixInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

abstract class ConfirmablePasswordController extends Controller implements
    ViewPrefixInterface,
    GuardInterface,
    RoutePrefixInterface
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view($this->getViewPrefix() . 'confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (!Auth::guard($this->getGuard())->validate([
            'email' => $request->user($this->getGuard())->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return to_route($this->getRoutePrefix() . 'home');
    }
}
