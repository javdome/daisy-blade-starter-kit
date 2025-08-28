<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-control">
            <label class="label" for="email">
                <span class="label-text">{{ __('Email') }}</span>
            </label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="input input-bordered w-full" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 form-control">
            <label class="label" for="password">
                <span class="label-text">{{ __('Password') }}</span>
            </label>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="input input-bordered w-full" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="checkbox" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="ms-3 btn btn-primary">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</x-guest-layout>
