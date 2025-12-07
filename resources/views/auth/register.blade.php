@section('title', 'Aktivasi')
<x-guest-layout>
    <form method="POST" action="/activation" @submit="splash = true">
        @csrf
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
        <div class="flex flex-col justify-center items-center gap-4 h-full w-full 2xl:w-md max-w-full 2xl:max-w-md">
            <div class="w-full flex flex-col justify-center items-start gap-2 mb-12">
                <img src="./img/logo_icon.svg" alt="Logo Icon" srcset="" class="h-15">
            </div>
            <div class="w-full flex flex-col justify-center items-start gap-2 mb-6">
                <h4 class="text-2xl 2xl:text-3xl font-bold">Selamat Datang!</h4>
                <span class="text-lg 2xl:text-xl text-gray-500">Aktivasi Akun MyGunadarma Anda</span>
            </div>
            <x-text-input type="text" nameid="username" :label="__('NPM/NIDN/NIP')" required />
            @if (session('error'))
                <p class="text-sm text-red-600">{{ session('error') }} Woi</p>
            @endif
            <hr class="w-full h-px border-gray-400" />
            <x-text-input type="password_confirmation" :label="__('Kata Sandi')" required />
            <div class="flex justify-between items-center w-full">
                <div class="flex justify-start items-center">
                    <x-show-password />
                </div>
                <div class="flex justify-end items-center">
                    <a href="https://baak.gunadarma.ac.id/" class="text-[var(--primary)] text-base cursor-pointer">Lupa
                        NPM?</a>
                </div>
            </div>
            <div class="w-full flex flex-col justify-center items-end gap-2 mt-6">
                <button type="submit"
                    class="bg-[var(--primary)] hover:bg-[var(--primary)] focus:bg-[var(--primary)] active:bg-[var(--primary)] text-white flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                    <span class="text-base">Aktivasi Akun</span>
                </button>
            </div>
        </div>
    </form>
    {{-- <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-guest-layout>
