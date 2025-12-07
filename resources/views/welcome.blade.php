@section('title', 'Selamat Datang')
<x-guest-layout>
    <div
        class="flex flex-col justify-center items-center gap-4 h-full w-full 2xl:w-md max-w-full 2xl:max-w-md">
        <a href="/login" @click="splash = true"
            class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] text-white flex justify-center items-center w-full p-3 rounded-full transition duration-150 ease-in-out">
            <span class="text-lg">Masuk</span>
        </a>
        <a href="/activation" @click="splash = true"
            class="bg-[var(--primary-container)] hover:bg-[var(--hover-primary-container)] focus:bg-[var(--focus-primary-container)] active:bg-[var(--active-primary-container)] text-[var(--primary)] flex justify-center items-center w-full p-3 rounded-full transition duration-150 ease-in-out">
            <span class="text-lg">Aktivasi Akun</span>
        </a>
    </div>
</x-guest-layout>