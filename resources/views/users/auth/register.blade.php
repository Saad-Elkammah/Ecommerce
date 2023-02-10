{{-- <x-guest-layout>
    <form method="POST" action="{{ route('users.register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('admins.login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<x-guest-layout>
    <!-- Register Content Start -->
    <div class="col-lg-6 mx-auto">
        <div class="login-reg-form-wrap mt-md-34 mt-sm-34">
            <h2>Singup Form</h2>
            <form action="{{ route('users.register') }}" method="post">
                @csrf
                <!-- Name -->
                <div class="single-input-item">
                    <input type="text" placeholder="Full Name" name="name" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!-- Email -->
                <div class="single-input-item">
                    <input type="email" placeholder="Enter your Email" name="email" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Phone Number -->
                <div class="single-input-item">
                    <input type="text" placeholder="Enter your Phone Number" name="phone" required />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <input type="password" name="password" placeholder="Enter your Password" required />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <input type="password" name="password_confirmation" placeholder="Repeat your Password" required />
                        </div>
                    </div>
                </div>
                <div class="single-input-item flex justify-between">
                    {{-- // make link for already registered user --}}
                    <a href="{{ route('users.login') }}" class="block">Already have an account?</a>
                    <button class="sqr-btn">Register</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Register Content End -->

</x-guest-layout>
