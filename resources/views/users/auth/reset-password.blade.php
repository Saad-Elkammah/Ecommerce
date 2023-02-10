<x-guest-layout>
    {{-- <form method="POST" action="{{ route('users.password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
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
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form> --}}
    <div class="login-register-wrapper">
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Reset Password  Content Start -->
                    <div class="col-lg-6 mx-auto">
                        <div class="login-reg-form-wrap pr-lg-50">
                            <h2>Create New Password</h2>
                            <form action="{{ route('users.password.store') }}" method="post">
                                @csrf
                                 <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <!-- Email Address -->
                                <div>
                                    <div class="single-input-item">
                                        <input type="email" name="email" placeholder="Email" :value="old('email')"
                                            required autofocus />
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <!-- Password -->
                                <div class="single-input-item">
                                    <input type="password" name="password" placeholder="New Password" required />
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                <!-- Confirm Password -->
                                <div class="single-input-item">
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                        required />
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                <div class="single-input-item">
                                    <button class="sqr-btn">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Reset Password Content End -->
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
