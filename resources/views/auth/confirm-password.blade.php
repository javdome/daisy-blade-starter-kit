<x-guest-layout>
    <div class="mb-4 text-sm text-base-content">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="form-control">
            <label class="label" for="password">
                <span class="label-text">{{__('Password')}}</span>
            </label>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="input input-bordered w-full" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Confirm') }}
            </button>
        </div>
    </form>
</x-guest-layout>