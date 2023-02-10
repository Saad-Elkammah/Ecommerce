<?php

namespace App\Http\Controllers\SellerAuth;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Auth\RegisteredUserController as AbstractRegisteredUserController;

class RegisteredUserController extends AbstractRegisteredUserController
{
    private $viewPrefix = 'sellers.';

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
     * Display the registration view.
     */
    // public function create(): View
    // {
    //     return view('admin.register');
    // }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) :RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Seller::class],
            'phone'=>['regex:/^01[0-2,5]{1}[0-9]{8}$/','unique:'.Seller::class],
            'shop_name'=>['required','string','max:255','unique:'.Seller::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $seller = Seller::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'shop_name'=>$request->shop_name,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($seller));

        Auth::guard('seller')->login($seller);
        return to_route('sellers.home');
    }


}
