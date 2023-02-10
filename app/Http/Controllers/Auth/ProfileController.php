<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Contracts\GuardInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Contracts\ViewPrefixInterface;
use App\Contracts\RoutePrefixInterface;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

abstract class ProfileController extends Controller implements
    ViewPrefixInterface,
    GuardInterface,
    RoutePrefixInterface
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // return view( $this->getViewPrefix()."profile.edit", [
        //     'user' => $request->user($this->getGuard()),
        // ]);

        return view('users.profile.profile', [
            'user' => $request->user($this->getGuard()),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user($this->getGuard())->fill($request->validated());

        if ($request->user($this->getGuard())->isDirty('email')) {
            $request->user($this->getGuard())->email_verified_at = null;
        }

        $request->user($this->getGuard())->save();

        return Redirect::route( $this->getRoutePrefix() . 'profile.edit')
        ->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user($this->getGuard());

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to( $this->getRoutePrefix() . 'home');
    }
}
