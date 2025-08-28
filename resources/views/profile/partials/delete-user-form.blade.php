<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-base-content/70">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button class="btn btn-error" onclick="delete_user_modal.showModal()">{{ __('Delete Account') }}</button>

    <dialog id="delete_user_modal" class="modal">
        <div class="modal-box">
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-base-content/70">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mt-6 form-control">
                    <label for="password" class="label sr-only"><span class="label-text">{{ __('Password') }}</span></label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="input input-bordered"
                        placeholder="{{ __('Password') }}"
                    />
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="button" class="btn" onclick="delete_user_modal.close()">{{ __('Cancel') }}</button>
                    <button class="btn btn-error ms-3">{{ __('Delete Account') }}</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
</section>