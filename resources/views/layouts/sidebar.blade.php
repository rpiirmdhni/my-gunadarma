<div class="flex flex-col flex-grow justify-between items-center">
    <div class="flex flex-col gap-4 w-full">
        <a href="{{ route('dashboard') }}" @click="splash = true" class="flex flex-col justify-center items-center gap-3 group">
            @if (Route::is('dashboard'))
                <div
                    class="bg-[var(--primary-container)] group-hover:bg-[var(--hover-primary-container)] group-focus:bg-[var(--focus-primary-container)] group-active:bg-[var(--active-primary-container)] flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                        class="fill-[var(--primary)] group-hover:fill-[var(--hover-primary)] group-focus:fill-[var(--focus-primary)] group-active:fill-[var(--active-primary)] transition duration-150 ease-in-out">
                        <path
                            d="M145.87-105.87v-501.29L480-858.09l334.7 250.74v501.48H563.39v-297.52H396.61v297.52H145.87Z" />
                    </svg>
                </div>
                <span
                    class="text-sm text-center font-semibold text-[var(--primary)] transition duration-150 ease-in-out">Beranda</span>
            @else
                <div
                    class="bg-transparent group-hover:bg-[var(--hover-tertiary)]/50 group-focus:bg-[var(--focus-tertiary)]/50 group-active:bg-[var(--active-tertiary)]/50 flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                        class="fill-[var(--surface-variant)]">
                        <path d="M229.06-189.06h133.06v-248.82h235.76v248.82h133.06v-376.49L480-753.72 229.06-565.5v376.44ZM153.3-113.3v-490.13L480-848.53l326.86 245.08v490.15H525.07v-251.77h-90.14v251.77H153.3ZM480-471.68Z"/>
                    </svg>
                </div>
                <span
                    class="text-sm text-center font-medium text-[var(--surface-variant)] transition duration-150 ease-in-out">Beranda</span>
            @endif
        </a>
        @if (!Auth::user()->role == 0)
            <a href="
            @if (Auth::user()->role == 3)
                {{ route('attendances.scanner') }}
            @elseif (Auth::user()->role == 2)
                {{ route('attendances.manage') }}
            @endif
            " @click="splash = true" class="flex flex-col justify-center items-center gap-3 group">
                @if (Route::is('attendances.scanner') || Route::is('attendances.manage'))
                    <div
                        class="bg-[var(--primary-container)] group-hover:bg-[var(--hover-primary-container)] group-focus:bg-[var(--focus-primary-container)] group-active:bg-[var(--active-primary-container)] flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                            class="fill-[var(--primary)] group-hover:fill-[var(--hover-primary)] group-focus:fill-[var(--focus-primary)] group-active:fill-[var(--active-primary)] transition duration-150 ease-in-out">
                            <path
                                d="M74.02-704.37v-181.85h181.61v68.37H142.15v113.48H74.02Zm0 630.35v-181.61h68.13v113.48h113.48v68.13H74.02Zm630.35 0v-68.13h113.48v-113.48h68.37v181.61H704.37Zm113.48-630.35v-113.48H704.37v-68.37h181.85v181.85h-68.37ZM708-251h63v63h-63v-63Zm0-126h63v63h-63v-63Zm-63 63h63v63h-63v-63Zm-63 63h63v63h-63v-63Zm-63-63h63v63h-63v-63Zm126-126h63v63h-63v-63Zm-63 63h63v63h-63v-63Zm-63-63h63v63h-63v-63Zm252-332v252H519v-252h252ZM440-440v252H188v-252h252Zm0-332v252H188v-252h252Zm-52.63 531.37v-146.74H240.63v146.74h146.74Zm0-332v-146.74H240.63v146.74h146.74Zm331 0v-146.74H571.63v146.74h146.74Z" />
                        </svg>
                    </div>
                    <span
                        class="text-sm text-center font-semibold text-[var(--primary)] transition duration-150 ease-in-out">Absensi</span>
                @else
                    <div
                        class="bg-transparent group-hover:bg-[var(--hover-tertiary)]/50 group-focus:bg-[var(--focus-tertiary)]/50 group-active:bg-[var(--active-tertiary)]/50 flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                            class="fill-[var(--surface-variant)]">
                            <path
                                d="M74.02-704.37v-181.85h181.61v68.37H142.15v113.48H74.02Zm0 630.35v-181.61h68.13v113.48h113.48v68.13H74.02Zm630.35 0v-68.13h113.48v-113.48h68.37v181.61H704.37Zm113.48-630.35v-113.48H704.37v-68.37h181.85v181.85h-68.37ZM708-251h63v63h-63v-63Zm0-126h63v63h-63v-63Zm-63 63h63v63h-63v-63Zm-63 63h63v63h-63v-63Zm-63-63h63v63h-63v-63Zm126-126h63v63h-63v-63Zm-63 63h63v63h-63v-63Zm-63-63h63v63h-63v-63Zm252-332v252H519v-252h252ZM440-440v252H188v-252h252Zm0-332v252H188v-252h252Zm-52.63 531.37v-146.74H240.63v146.74h146.74Zm0-332v-146.74H240.63v146.74h146.74Zm331 0v-146.74H571.63v146.74h146.74Z" />
                        </svg>
                    </div>
                    <span
                        class="text-sm text-center font-medium text-[var(--surface-variant)] transition duration-150 ease-in-out">Absensi</span>
                @endif
            </a>
        @endif
        <a href="{{ route('todolist') }}" @click="splash = true" class="flex flex-col justify-center items-center gap-3 group">
            @if (Route::is('todolist'))
                <div
                    class="bg-[var(--primary-container)] group-hover:bg-[var(--hover-primary-container)] group-focus:bg-[var(--focus-primary-container)] group-active:bg-[var(--active-primary-container)] flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                        class="fill-[var(--primary)] group-hover:fill-[var(--hover-primary)] group-focus:fill-[var(--focus-primary)] group-active:fill-[var(--active-primary)] transition duration-150 ease-in-out">
                        <path d="M640-120q-33 0-56.5-23.5T560-200v-160q0-33 23.5-56.5T640-440h160q33 0 56.5 23.5T880-360v160q0 33-23.5 56.5T800-120H640ZM80-240v-80h360v80H80Zm560-280q-33 0-56.5-23.5T560-600v-160q0-33 23.5-56.5T640-840h160q33 0 56.5 23.5T880-760v160q0 33-23.5 56.5T800-520H640ZM80-640v-80h360v80H80Z"/>
                    </svg>
                </div>
                <span class="text-sm text-center font-semibold text-[var(--primary)] transition duration-150 ease-in-out">To-Do
                    List</span>
            @else
                <div
                    class="bg-transparent group-hover:bg-[var(--hover-tertiary)]/50 group-focus:bg-[var(--focus-tertiary)]/50 group-active:bg-[var(--active-tertiary)]/50 flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                        class="fill-[var(--surface-variant)]">
                        <path
                            d="M640.48-114.02q-34.52 0-58.93-24.35-24.42-24.34-24.42-58.76v-159.76q0-34.2 24.42-58.65Q605.96-440 640.48-440H800q34.52 0 58.93 24.46 24.42 24.45 24.42 58.65v159.76q0 34.42-24.42 58.76-24.41 24.35-58.93 24.35H640.48Zm-14.98-68.13h189.48v-189.72H625.5v189.72ZM74.02-242.83v-68.37h362.87v68.37H74.02ZM640.48-520q-34.52 0-58.93-24.41-24.42-24.42-24.42-58.94v-159.52q0-34.52 24.42-58.93 24.41-24.42 58.93-24.42H800q34.52 0 58.93 24.42 24.42 24.41 24.42 58.93v159.52q0 34.52-24.42 58.94Q834.52-520 800-520H640.48Zm-14.98-68.37h189.48v-189.48H625.5v189.48ZM74.02-649.04v-68.13h362.87v68.13H74.02Zm646.22 372.15Zm0-406.22Z" />
                    </svg>
                </div>
                <span
                    class="text-sm text-center font-medium text-[var(--surface-variant)] transition duration-150 ease-in-out">To-Do
                    List</span>
            @endif
        </a>
        <a href="{{ route('elib.index') }}" @click="splash = true" class="flex flex-col justify-center items-center gap-3 group">
            @if (Route::is('elib.index'))
                <div
                    class="bg-[var(--primary-container)] group-hover:bg-[var(--hover-primary-container)] group-focus:bg-[var(--focus-primary-container)] group-active:bg-[var(--active-primary-container)] flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                        class="fill-[var(--primary)] group-hover:fill-[var(--hover-primary)] group-focus:fill-[var(--focus-primary)] group-active:fill-[var(--active-primary)] transition duration-150 ease-in-out">
                        <path d="M290.14-73.3q-56.91 0-96.87-39.97-39.97-39.96-39.97-96.87v-539.72q0-56.98 39.97-96.99 39.96-40.01 96.87-40.01h516.72v613.56q-24.36 0-40.43 18.8-16.07 18.81-16.07 44.35 0 25.53 16.07 44.27 16.07 18.74 40.43 18.74v73.84H290.14Zm30.34-273.92h73.84v-465.79h-73.84v465.79Zm-30.34 200.08h402.03q-7.38-13.84-11.51-29.81-4.14-15.98-4.14-33.2 0-17.63 4.03-33.39 4.03-15.77 12.28-29.76H290.14q-26.61 0-44.8 18.4-18.2 18.4-18.2 44.75 0 26.62 18.2 44.81 18.19 18.2 44.8 18.2Z"/>
                    </svg>
                </div>
                <span
                    class="text-sm text-center font-semibold text-[var(--primary)] transition duration-150 ease-in-out">E-Library</span>
            @else
                <div
                    class="bg-transparent group-hover:bg-[var(--hover-tertiary)]/50 group-focus:bg-[var(--focus-tertiary)]/50 group-active:bg-[var(--active-tertiary)]/50 flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                        class="fill-[var(--surface-variant)]">
                        <path
                            d="M287.13-74.02q-55.27 0-94.19-38.92-38.92-38.92-38.92-94.19v-545.74q0-55.37 38.92-94.36t94.19-38.99h519.09v612.2q-24.93 0-40.91 20.09-15.98 20.09-15.98 46.79 0 26.69 15.98 46.68 15.98 19.98 40.91 19.98v66.46H287.13Zm-66.65-247.89q14.23-9.1 30.89-13.83 16.66-4.74 35.76-4.74h33.35v-479.28h-33.35q-28.09 0-47.37 19.4-19.28 19.4-19.28 47.49v430.96Zm166.45-18.57h352.83v-479.28H386.93v479.28Zm-166.45 18.57v-497.85 497.85Zm66.19 181.43h414q-8.44-14.22-13.12-31.41-4.68-17.2-4.68-35.21 0-19.07 4.73-35.75 4.74-16.68 14.07-31.17H286.74q-27.46 0-46.86 19.4t-19.4 47.48q0 27.86 19.4 47.26t46.79 19.4Z" />
                    </svg>
                </div>
                <span
                    class="text-sm text-center font-medium text-[var(--surface-variant)] transition duration-150 ease-in-out">E-Library</span>
            @endif
        </a>
    </div>
    <a href="{{ route('profile.edit') }}" @click="splash = true"
        class="flex flex-col justify-center items-center gap-3 bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50 p-4 rounded-full transition duration-150 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
            class="fill-[var(--surface-variant)]">
            <path
                d="M479.95-484.11q-68.68 0-112.3-43.62-43.63-43.63-43.63-112.31t43.63-112.35q43.62-43.68 112.3-43.68t112.47 43.68q43.8 43.67 43.8 112.35 0 68.68-43.8 112.31-43.79 43.62-112.47 43.62Zm-325.93 333.2v-100.41q0-39.56 19.92-68.04 19.91-28.49 51.43-43.27 67.48-30.24 129.69-45.36 62.2-15.12 124.88-15.12 63.13 0 124.79 15.62 61.66 15.62 128.82 45.05 32.88 14.6 52.78 43 19.89 28.4 19.89 68.06v100.47h-652.2Zm68.13-68.13h515.7v-31.37q0-15.85-9.5-30.22-9.5-14.38-23.5-21.3-63.05-30.29-115.45-41.55-52.4-11.26-109.52-11.26-56.64 0-110.28 11.26t-115.35 41.51q-14.1 6.93-23.1 21.31-9 14.39-9 30.25v31.37Zm257.8-333.2q38.09 0 63-24.86 24.9-24.87 24.9-62.98 0-38.21-24.86-63.03-24.85-24.82-62.94-24.82-38.09 0-63 24.83-24.9 24.84-24.9 62.9 0 38.17 24.86 63.06 24.85 24.9 62.94 24.9Zm.05-87.85Zm0 421.05Z" />
        </svg>
    </a>
</div>
