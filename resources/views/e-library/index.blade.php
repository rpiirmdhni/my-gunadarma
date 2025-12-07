@section('title', 'E-Library')
<x-app-layout>
    <div class="flex flex-col justify-center items-start gap-4 w-full">
        <div class="flex flex-col justify-center items-start gap-2">
            <h3 class="text-4xl 2xl:text-5xl font-bold">E-Library</h3>
            <p class="text-[var(--surface-variant)]">Membaca buku dengan lebih mudah dengan fitur E-Library MyGunadarma
            </p>
        </div>
    </div>

    <div class="flex flex-col gap-4">
        <div class="sticky top-0 flex justify-between items-center gap-4 w-full bg-white py-4">
            <h3 class="text-xl 2xl:text-4xl font-medium">Baru Ditambahkan</h3>
            <div class="flex flex-col justify-center items-end gap-4">
                <div class="flex justify-end items-center w-auto 2xl:w-md">
                    <form action="{{ route('elib.index') }}" method="get" class="w-full max-w-xs">
                        <div class="relative group w-full">
                            <input type="text" id="search" name="search" placeholder=" "
                                value="{{ request('search') }}"
                                class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                            />
                            <label for="search"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                                group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs">
                                Cari Buku
                            </label>
                        </div>
                    </form>
                </div>
                <div class="flex justify-center items-center gap-4">
                    @if ($prevPage)
                        <a href="{{ route('elib.index', ['page' => $prevPage, 'search' => request('search')]) }}" @click="splash = true"
                            class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] text-white flex justify-center items-center px-5 py-2 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                                class="fill-white">
                                <path
                                    d="M560.67-233.62 313.62-480.67l247.05-247.04L614.38-674 421.04-480.67l193.34 193.34-53.71 53.71Z" />
                            </svg>
                        </a>
                    @else
                        <span></span>
                    @endif
                    @if ($nextPage)
                        <a href="{{ route('elib.index', ['page' => $nextPage, 'search' => request('search')]) }}" @click="splash = true"
                            class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] text-white flex justify-center items-center px-5 py-2 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                                class="fill-white">
                                <path
                                    d="M514.96-480.67 321.62-674l53.71-53.71 247.05 247.04-247.05 247.05-53.71-53.71 193.34-193.34Z" />
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="flex flex-col justify-center items-start gap-4 w-full">

            @if (count($digibooks) === 0)
                <p class="text-[var(--surface-variant)]">Pencarian Tidak Ditemukan atau Belum ada buku yang ditambahkan.</p>
            @endif

            <div class="grid grid-cols-2 2xl:grid-cols-4 gap-4 w-full">

                @foreach ($digibooks as $digibook)
                    @php
                        $cover = $digibook['formats']['image/jpeg'] ?? 'default-cover.png';
                        $file = $digibook['formats']['application/pdf']
                            ?? ($digibook['formats']['text/html'] ?? null);

                        $writer = $digibook['authors'][0]['name'] ?? 'Unknown Author';
                    @endphp

                    @if (!$file)
                        @continue
                    @endif

                    <a href="{{ $file }}" @click="splash = true"
                        class="col-span-1 bg-[var(--secondary)] hover:bg-[var(--hover-secondary)]
                            focus:bg-[var(--focus-secondary)] active:bg-[var(--active-secondary)]
                            p-2 2xl:p-4 flex flex-col justify-center items-center gap-2 2xl:gap-4
                            rounded-2xl cursor-pointer transition duration-150 ease-in-out truncate">

                        {{-- Cover buku --}}
                        <img src="{{ $cover }}" class="w-full rounded-xl" alt="{{ $digibook['title'] }}">

                        {{-- Judul & Author --}}
                        <div class="flex flex-col justify-center items-center 2xl:items-start gap-2 w-full">
                            <h3 class="text-2xl 2xl:text-4xl font-medium truncate text-center 2xl:text-start w-full">
                                {{ $digibook['title'] }}
                            </h3>

                            @if ($writer)
                                <div class="truncate">
                                    <span class="bg-blue-600 px-3 py-px rounded-md text-white text-sm truncate">
                                        {{ $writer }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <p class="w-full truncate text-[var(--surface-variant)]">
                            {{ $digibook['summaries'][0] ?? null }}
                        </p>
                    </a>

                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
