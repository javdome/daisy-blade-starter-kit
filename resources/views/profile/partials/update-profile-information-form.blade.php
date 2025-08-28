<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-base-content/70">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="form-control">
            <label class="label" for="name"><span class="label-text">{{__('Name')}}</span></label>
            <input id="name" name="name" type="text" value="{{old('name', $user->name)}}" required autofocus autocomplete="name" class="input input-bordered" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="form-control">
            <label class="label" for="email"><span class="label-text">{{__('Email')}}</span></label>
            <input id="email" name="email" type="email" value="{{old('email', $user->email)}}" required autocomplete="username" class="input input-bordered" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm hover:text-base-content/70 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
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