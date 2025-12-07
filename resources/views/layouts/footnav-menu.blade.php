<footer class="sticky bottom-0 bg-[var(--surface-container)] flex 2xl:hidden flex-col p-2 items-center justify-center">
    <div class="grid
    @if (!Auth::user()->role == 0)
        grid-cols-3
    @else
        grid-cols-2
    @endif
    gap-2 w-full">
        <a href="{{ route('dashboard') }}"
            class="flex flex-col justify-center items-center gap-2 group text-[var(--primary)]">
            <div
                class="bg-[var(--primary-container)] group-hover:bg-[var(--primary-container)] group-focus:bg-[var(--primary-container)] group-active:bg-[var(--primary-container)] flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                    class="fill-[var(--primary)]">
                    <path
                        d="M145.87-105.87v-501.29L480-858.09l334.7 250.74v501.48H563.39v-297.52H396.61v297.52H145.87Z" />
                </svg>
            </div>
            <span class="text-xs font-semibold text-[var(--primary)] transition duration-150 ease-in-out">Beranda</span>
        </a>
        @if (!Auth::user()->role == 0)
            <a href="
            @if (Auth::user()->role == 3) {{ route('attendances.scanner') }}
            @elseif (Auth::user()->role == 2)
                {{ route('attendances.manage') }} @endif
            "
                class="flex flex-col justify-center items-center gap-2 group">
                <div
                    class="bg-transparent group-hover:bg-[var(--hover-tertiary)]/50 group-focus:bg-[var(--focus-tertiary)]/50 group-active:bg-[var(--active-tertiary)]/50 flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                        class="fill-[var(--surface-variant)]">
                        <path
                            d="M74.02-704.37v-181.85h181.61v68.37H142.15v113.48H74.02Zm0 630.35v-181.61h68.13v113.48h113.48v68.13H74.02Zm630.35 0v-68.13h113.48v-113.48h68.37v181.61H704.37Zm113.48-630.35v-113.48H704.37v-68.37h181.85v181.85h-68.37ZM708-251h63v63h-63v-63Zm0-126h63v63h-63v-63Zm-63 63h63v63h-63v-63Zm-63 63h63v63h-63v-63Zm-63-63h63v63h-63v-63Zm126-126h63v63h-63v-63Zm-63 63h63v63h-63v-63Zm-63-63h63v63h-63v-63Zm252-332v252H519v-252h252ZM440-440v252H188v-252h252Zm0-332v252H188v-252h252Zm-52.63 531.37v-146.74H240.63v146.74h146.74Zm0-332v-146.74H240.63v146.74h146.74Zm331 0v-146.74H571.63v146.74h146.74Z" />
                    </svg>
                </div>
                <span
                    class="text-xs font-medium text-[var(--surface-variant)] transition duration-150 ease-in-out">Absensi</span>
            </a>
        @endif
        <a href="{{ route('profile.edit') }}" class="flex flex-col justify-center items-center gap-2 group">
            <div
                class="bg-transparent group-hover:bg-[var(--hover-tertiary)]/50 group-focus:bg-[var(--focus-tertiary)]/50 group-active:bg-[var(--active-tertiary)]/50 flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                    class="fill-[var(--surface-variant)]">
                    <path
                        d="M479.95-484.11q-68.68 0-112.3-43.62-43.63-43.63-43.63-112.31t43.63-112.35q43.62-43.68 112.3-43.68t112.47 43.68q43.8 43.67 43.8 112.35 0 68.68-43.8 112.31-43.79 43.62-112.47 43.62Zm-325.93 333.2v-100.41q0-39.56 19.92-68.04 19.91-28.49 51.43-43.27 67.48-30.24 129.69-45.36 62.2-15.12 124.88-15.12 63.13 0 124.79 15.62 61.66 15.62 128.82 45.05 32.88 14.6 52.78 43 19.89 28.4 19.89 68.06v100.47h-652.2Zm68.13-68.13h515.7v-31.37q0-15.85-9.5-30.22-9.5-14.38-23.5-21.3-63.05-30.29-115.45-41.55-52.4-11.26-109.52-11.26-56.64 0-110.28 11.26t-115.35 41.51q-14.1 6.93-23.1 21.31-9 14.39-9 30.25v31.37Zm257.8-333.2q38.09 0 63-24.86 24.9-24.87 24.9-62.98 0-38.21-24.86-63.03-24.85-24.82-62.94-24.82-38.09 0-63 24.83-24.9 24.84-24.9 62.9 0 38.17 24.86 63.06 24.85 24.9 62.94 24.9Zm.05-87.85Zm0 421.05Z" />
                </svg>
            </div>
            <span
                class="text-xs font-medium text-[var(--surface-variant)] transition duration-150 ease-in-out">Profil</span>
        </a>
    </div>
</footer>
