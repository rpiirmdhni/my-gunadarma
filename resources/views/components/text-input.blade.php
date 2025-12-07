@props(['disabled' => false, 'label' => null, 'nameid' => null, 'type' => 'text', 'required' => false])

@if ($type === 'password_confirmation')
	{{-- Password --}}
	<div class="relative group w-full">
		<input
            data-password
			type="password"
			id="password"
			name="password"
			placeholder=" "
			{{ $required ? 'required' : '' }}
			{{ $disabled ? 'disabled' : '' }}
			class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
			focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200 cursor-text" />
		<label
			for="password"
			class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
			group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
			group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
			{{ $label ?? 'Kata Sandi' }}
		</label>
	</div>

	{{-- Password Confirmation --}}
	<div class="relative group w-full">
		<input
            data-password
			type="password"
			id="password_confirmation"
			name="password_confirmation"
			placeholder=" "
			{{ $required ? 'required' : '' }}
			{{ $disabled ? 'disabled' : '' }}
			class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
			focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200 cursor-text" />
		<label
			for="password_confirmation"
			class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
			group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
			group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
			Ulangi {{ $label ?? 'Kata Sandi' }}
		</label>
	</div>
@elseif ($type === 'password')
    <div class="relative group w-full">
		<input
            data-password
			type="password"
			id="password"
			name="password"
			placeholder=" "
			{{ $required ? 'required' : '' }}
			{{ $disabled ? 'disabled' : '' }}
			class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
			focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200 cursor-text" />
		<label
			for="password"
			class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
			group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
			group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
			{{ $label ?? 'Kata Sandi' }}
		</label>
	</div>
@else
	{{-- Default Input --}}
	<div class="relative group w-full">
		<input
			type="{{ $type }}"
			id="{{ $nameid ?? $slot }}"
			name="{{ $nameid ?? $slot }}"
			placeholder=" "
			{{ $required ? 'required' : '' }}
			{{ $disabled ? 'disabled' : '' }}
			{{ $attributes->merge(['class' => 'block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
			focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200 cursor-text']) }} />
		<label
			for="{{ $nameid ?? $slot }}"
			class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
			group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
			group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
			{{ $label ?? $slot }}
		</label>
	</div>
@endif
