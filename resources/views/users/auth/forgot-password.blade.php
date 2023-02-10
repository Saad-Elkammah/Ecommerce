<x-guest-layout>
    {{-- <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div> --}}

    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
    {{--
    <form method="POST" action="{{ route('users.password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form> --}}
    <div class="login-register-wrapper">
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Forget Password  Content Start -->
                    <div class="col-lg-6 mx-auto">
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <div class="login-reg-form-wrap  pr-lg-50">
                            <h2>Lost Password</h2>
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            <form action="{{ route('users.password.email') }}" method="post">
                                @csrf
                                <!-- Email Address -->
                                <div>
                                    <div class="single-input-item">
                                        <input type="email" name="email" placeholder="Email" :value="old('email')"
                                            required autofocus />
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="single-input-item">
                                    <button class="sqr-btn">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Forget Password Content End -->
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
