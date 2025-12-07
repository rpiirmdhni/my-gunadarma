@section('title', 'Masuk')
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="block 2xl:hidden sticky top-0 left-0 w-full 2xl:w-md max-w-full 2xl:max-w-md">
        <a href="guest.html" class="flex justify-start items-center gap-2 text-[var(--primary)]">
            <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                class="fill-[var(--primary)]">
                <path
                    d="m283.8-445.93 244.18 244.17L480-154.02 154.02-480 480-806.22l47.98 47.98L283.8-514.07h522.42v68.14H283.8Z" />
            </svg>
            <span>Kembali</span>
        </a>
    </div>
    <form method="POST" action="/login" @submit="splash = true">
        @csrf
        <div class="flex flex-col justify-center items-center gap-4 h-full w-full 2xl:w-md max-w-full 2xl:max-w-md">
            <div class="w-full flex flex-col justify-center items-start gap-2 mb-12">
                <img src="./img/logo_icon.svg" alt="Logo Icon" srcset="" class="h-15">
            </div>
            <div class="w-full flex flex-col justify-center items-start gap-2 mb-6">
                <h4 class="text-2xl 2xl:text-3xl font-bold">Selamat Datang Kembali!</h4>
                <span class="text-lg 2xl:text-xl text-gray-500">Masuk dengan Akun MyGunadarma Anda</span>
            </div>
            {{-- <div class="relative group w-full">
							<input
								type="text"
								id="username"
								name="username"
								placeholder=" "
								class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
								focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
								required />
							<label
								for="username"
								class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
								group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
								group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
							NPM/NIDN/NIP
							</label>
						</div> --}}
            <x-text-input type="text" nameid="username" :label="__('NPM/NIDN/NIP')" required />
            <x-text-input type="password" nameid="password" :label="__('Kata Sandi')" required />

            <div class="flex justify-between items-center w-full">
                <div class="flex justify-start items-center">
                    <x-show-password />
                </div>
                <div class="flex justify-end items-center">
                    {{-- <a href="" class="text-[var(--primary)] text-base cursor-pointer">Lupa Kata Sandi?</a> --}}
                </div>
            </div>
            <div class="w-full flex flex-col justify-center items-end gap-2 mt-6">
                <button type="submit"
                    class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] text-white flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                    <span class="text-base">Masuk</span>
                </button>
            </div>
        </div>
    </form>

    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-guest-layout>
