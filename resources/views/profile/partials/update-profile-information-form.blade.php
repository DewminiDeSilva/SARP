<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="profile_photo" :value="__('Profile Picture')" />
            <div class="mt-2 flex items-center gap-4">
                @if($user->profile_image)
                    <img src="{{ $user->profile_image }}" alt="Profile" class="h-20 w-20 rounded-full object-cover border-2 border-gray-200" id="profile-photo-preview">
                    <div class="h-20 w-20 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 hidden" id="profile-photo-placeholder">No photo</div>
                @else
                    <div class="h-20 w-20 rounded-full bg-gray-200 flex items-center justify-center text-gray-500" id="profile-photo-placeholder">No photo</div>
                    <img src="" alt="" class="h-20 w-20 rounded-full object-cover border-2 border-gray-200 hidden" id="profile-photo-preview">
                @endif
                <div>
                    <input type="file" name="profile_photo" id="profile_photo" accept="image/jpeg,image/png,image/jpg,image/gif" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                    <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 2MB. Used in header (e.g. admin1img).</p>
                    <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
                </div>
            </div>
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
    <script>
        document.getElementById('profile_photo')?.addEventListener('change', function(e) {
            var file = e.target.files[0];
            if (!file || !file.type.startsWith('image/')) return;
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('profile-photo-preview');
                var placeholder = document.getElementById('profile-photo-placeholder');
                if (preview) {
                    preview.src = reader.result;
                    preview.classList.remove('hidden');
                }
                if (placeholder) placeholder.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        });
    </script>
</section>
