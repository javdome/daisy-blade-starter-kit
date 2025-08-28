<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-base-content/70">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="form-control">
            <label class="label" for="update_password_current_password"><span class="label-text">{{__('Current Password')}}</span></label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" class="input input-bordered" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="form-control">
            <label class="label" for="update_password_password"><span class="label-text">{{__('New Password')}}</span></label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password" class="input input-bordered" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="form-control">
            <label class="label" for="update_password_password_confirmation"><span class="label-text">{{__('Confirm Password')}}</span></label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" class="input input-bordered" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-base-content/70"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>