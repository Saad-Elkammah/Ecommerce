<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\ViewPrefixInterface;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

abstract class RegisteredUserController extends Controller implements ViewPrefixInterface
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // dd($this->getViewPrefix());
        return view($this->getViewPrefix().'auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
    //         'phone'=>['regex:/^01[0-2,5]{1}[0-9]{8}$/','unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'phone'=>$request->phone,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect(RouteServiceProvider::HOME);
    // }
}
