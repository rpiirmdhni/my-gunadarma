@section('title', 'Akun')
<x-app-layout>
	<div class="flex flex-col justify-center items-center gap-4 2xl:gap-6 w-full">
		<div class="flex gap-4 2xl:gap-6 w-full 2xl:w-xl justify-center items-center">
			<div
				class="w-25 2xl:w-30 h-25 2xl:h-30 aspect-1/1 p-4 bg-[var(--primary-container)] rounded-full flex justify-center items-center flex justify-center items-center">
				<span
					class="text-[var(--primary)] text-5xl font-medium flex justify-center items-center">
				@php
				$firstChar = Auth::user()->name;
				echo $firstChar[0];
				@endphp
				</span>
			</div>
			<div class="flex flex-col gap-4 w-full 2xl:w-lg">
				<div class="relative group w-full">
					<input type="text" id="username" name="username" placeholder=" "
						value="{{ Auth::user()->username }}"
						class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
						focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
						required readonly />
					<label for="username"
						class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
						group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
						group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
					NPM/NIDN/NIP
					</label>
				</div>
				<div class="relative group w-full">
					<input type="text" id="name" name="name" placeholder=" "
						value="{{ Auth::user()->name }}"
						class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
						focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
						required readonly />
					<label for="name"
						class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
						group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
						group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
					Nama Lengkap
					</label>
				</div>
			</div>
		</div>
		<hr class="w-full 2xl:w-lg border-gray-400">
		<form action="{{ route('password.update') }}" method="post" @submit="splash = true"
			class="flex flex-col gap-4 2xl:gap-6 justify-center items-center w-full 2xl:w-xl">
            @csrf
            @method('put')
			<div class="relative group w-full">
				<input type="password" id="current_password" name="current_password" placeholder=" "
					value=""
					class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
					focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
					required data-password />
				<label for="current_password"
					class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
					group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
					group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
				Kata Sandi Saat Ini
				</label>
			</div>
			<div class="grid grid-cols-1 2xl:grid-cols-2 gap-4 2xl:gap-6 w-full">
				<div class="relative group w-full">
					<input type="password" id="password" name="password" placeholder=" "
						value=""
						class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
						focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
						required data-password />
					<label for="password"
						class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
						group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
						group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
					Kata Sandi Baru
					</label>
				</div>
				<div class="relative group w-full">
					<input type="password" id="password_confirmation" name="password_confirmation"
						placeholder=" " value=""
						class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
						focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
						required data-password />
					<label for="password_confirmation"
						class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
						group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
						group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
					Ulangi Kata Sandi Baru
					</label>
				</div>
                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-400"
                    >{{ __('Kata Sandi berhasil diubah.') }}</p>
                @endif
			</div>
			<div class="grid grid-cols-2 gap-4 2xl:gap-6 w-full">
				<x-show-password />
				<div class="flex justify-end items-center">
					<button type="submit"
						class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] text-white flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
					<span class="text-base">Ubah Kata Sandi</span>
					</button>
				</div>
			</div>
		</form>
		<hr class="w-full 2xl:w-lg border-gray-400">
		<form method="POST" action="{{ route('logout') }}" @submit="splash = true"
			class="w-full 2xl:w-xl flex justify-center items-center">
			@csrf
			<button type="submit" @click="splash = true"
				class="bg-[var(--error)] hover:bg-[var(--hover-error)] focus:bg-[var(--focus-error)] active:bg-[var(--active-error)] text-white flex justify-center items-center px-6 py-3 rounded-full cursor-pointer w-full transition duration-150 ease-in-out">
			<span class="text-base">Keluar dari Akun</span>
			</button>
		</form>
	</div>
</x-app-layout>
