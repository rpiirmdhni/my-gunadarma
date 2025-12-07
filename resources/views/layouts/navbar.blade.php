@if (View::getSection('title') == 'Dasbor')
    <nav id="navbar"
        class="sticky top-0 px-4 2xl:px-40 py-4 2xl:py-6 transition duration-150 ease-in-out rounded-b-xl 2xl:rounded-b-2xl">
        <div class="flex justify-between items-center">
            <!-- Logo (for Desktop) -->
            <img src="./img/logo.svg" alt="Logo" id="logo" class="hidden 2xl:block h-12">
            <!-- Logo (for Mobile) -->
            <img src="./img/logo_icon.svg" alt="Logo" class="block 2xl:hidden h-12">
            <button type="button" @click="showModalAbout = true"
                class="flex flex-col justify-center items-center gap-3 bg-transparent hover:bg-[var(--tertiary)]/50 focus:bg-[var(--tertiary)]/50 active:bg-[var(--tertiary-container)]/50 p-4 rounded-full cursor-pointer transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                    class="fill-[var(--surface-variant)]">
                    <path
                        d="M450.37-277.37h65.26V-520h-65.26v242.63ZM480-590.41q15.55 0 26.07-10.23 10.52-10.24 10.52-25.36 0-16.24-10.52-26.92-10.51-10.67-26.05-10.67-15.81 0-26.21 10.67-10.4 10.68-10.4 26.8 0 15.27 10.52 25.49 10.52 10.22 26.07 10.22Zm.3 516.39q-84.2 0-158.04-31.88-73.84-31.88-129.16-87.2-55.32-55.32-87.2-129.2-31.88-73.88-31.88-158.17 0-84.28 31.88-158.2 31.88-73.91 87.16-128.74 55.28-54.84 129.18-86.82 73.9-31.99 158.21-31.99 84.3 0 158.25 31.97 73.94 31.97 128.75 86.77 54.82 54.8 86.79 128.88 31.98 74.08 31.98 158.33 0 84.24-31.99 158.07-31.98 73.84-86.82 128.95-54.83 55.1-128.87 87.17Q564.5-74.02 480.3-74.02Zm.2-68.13q140.54 0 238.95-98.75 98.4-98.76 98.4-239.6 0-140.54-98.22-238.95-98.21-98.4-239.75-98.4-140.16 0-238.95 98.22-98.78 98.21-98.78 239.75 0 140.16 98.75 238.95 98.76 98.78 239.6 98.78ZM480-480Z" />
                </svg>
            </button>
        </div>
    </nav>
@else
    <nav id="navbar"
        class="block 2xl:hidden @if (Route::is('presence.scanner')) fixed w-dvw
        @elseif (Route::is('elib.index'))
        
        @else
        sticky @endif top-0 px-4 2xl:px-40 py-4 2xl:py-6 transition duration-150 ease-in-out rounded-b-xl 2xl:rounded-b-2xl bg-white z-100">
        <button type="button" onclick="history.back()" @click="splash = true"
            class="flex justify-start items-center gap-2 text-[var(--primary)]">
            <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                class="fill-[var(--primary)]">
                <path
                    d="m283.8-445.93 244.18 244.17L480-154.02 154.02-480 480-806.22l47.98 47.98L283.8-514.07h522.42v68.14H283.8Z" />
            </svg>
            <span>Kembali</span>
        </button>
    </nav>
@endif
