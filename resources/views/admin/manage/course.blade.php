@section('title', 'Kelola Mata Kuliah')
<x-app-layout>
    <div class="flex flex-col justify-center items-start gap-4 w-full">
        <div class="flex flex-col justify-center items-start gap-2">
            <h3 class="text-4xl 2xl:text-5xl font-bold">Kelola Mata Kuliah</h3>
            <p class="text-[var(--surface-variant)]">Akses dan kelola Mata Kuliah langsung dari sini</p>
        </div>
        <div class="flex justify-end items-center gap-4 w-full">
            <!--Akan Hadir-->
            <!--<div class="relative group w-full 2xl:w-auto">
                <input type="text" id="search" name="search" placeholder=" " value=""
                    class="block w-full 2xl:w-auto border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                    focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200" />
                <label for="search"
                    class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                    group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                    group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs">
                    Cari Mata Kuliah
                </label>
            </div>-->
            <button type="button" @click="showModalCourseAdd = true"
                class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] px-5 py-3 flex justify-between items-center gap-2 rounded-full cursor-pointer transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                    class="h-[26px] w-[26px] 2xl:h-[26px] 2xl:w-[26px] fill-white">
                    <path
                        d="M445.93-445.93H194.02v-68.14h251.91v-252.15h68.14v252.15h252.15v68.14H514.07v251.91h-68.14v-251.91Z" />
                </svg>
                <span class="hidden 2xl:block text-base 2xl:text-lg text-white">Tambah</span>
            </button>
        </div>
    </div>
    <div class="grid grid-cols-1 2xl:grid-cols-4 gap-4">
        @foreach ($courses as $course)
            <div
                class="bg-[var(--secondary)] p-4 flex flex-col justify-between items-center gap-8 rounded-2xl transition duration-150 ease-in-out">
                <div class="flex justify-start items-center w-full">
                    <h3 class="text-xl 2xl:text-2xl font-bold text-start">{{ $course->name }}</h3>
                </div>
                <div class="flex justify-end items-center gap-2 w-full" x-data="{ showModalCourse_{{ $course->id }}_edit: false }">
                    <button type="button" @click="showModalCourse_{{ $course->id }}_edit = true"
                        class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] px-5 py-3 flex justify-center items-center gap-2 rounded-full cursor-pointer transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" height="20px" width="20px"
                            class="fill-white">
                            <path
                                d="M188.82-189.06h48.57l431.45-430.78-48.09-48.33-431.93 431.1v48.01ZM113.3-113.3v-154.76l558.86-558.09q9.65-9.56 22.43-14.8t26.72-5.24q13.15 0 26.04 5.24 12.89 5.24 23.35 14.89l56.36 55.97q10.32 10.39 15.1 23.4 4.77 13.01 4.77 26.14 0 13.38-5.11 26.48t-14.76 22.91L268.38-113.3H113.3Zm655.06-607.92-46.24-46.48 46.24 46.48Zm-123.61 77.14-24-24.09 48.09 48.33-24.09-24.24Z" />
                        </svg>
                    </button>
                    <form action="{{ route('admin.manage.courses.destroy', $course->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-[var(--error)] hover:bg-[var(--hover-error)] focus:bg-[var(--focus-error)] active:bg-[var(--active-error)] px-5 py-3 flex justify-center items-center gap-2 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                width="20px" class="fill-white">
                                <path
                                    d="m251.33-198.29-53.04-53.04L426.96-480 198.29-708.67l53.04-53.04L480-533.04l228.67-228.67 53.04 53.04L533.04-480l228.67 228.67-53.04 53.04L480-426.96 251.33-198.29Z" />
                            </svg>
                        </button>
                    </form>
                    <div x-show="showModalCourse_{{ $course->id }}_edit && !splash"
                        @click.self="showModalCourse_{{ $course->id }}_edit = false" x-transition.opacity
                        x-init="$el.classList.remove('hidden')"
                        class="hidden fixed inset-0 p-4 !z-[9999] flex justify-center items-center bg-black/50" x-cloak>

                        <form action="{{ route('admin.manage.courses.update', $course->id) }}" method="POST"
                            @submit="splash = true"
                            class="bg-white min-w-full max-w-full 2xl:min-w-xl 2xl:max-w-xl rounded-3xl flex flex-col"
                            @click.stop>

                            @csrf
                            @method('put')

                            <div class="flex justify-between items-center gap-2 p-6">
                                <span class="text-2xl">Edit Mata Kuliah</span>
                            </div>

                            <div class="flex flex-col justify-center items-start gap-4 px-6">
                                {{-- Course Name --}}
                                <div class="relative group w-full">
                                    <input type="text" id="name" name="name" placeholder=" "
                                        value="{{ $course->name }}"
                                        class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                        required />

                                    <label for="name"
                                        class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                                group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                        Nama Mata Kuliah
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-end items-center gap-2 p-6">
                                <button type="button" @click="showModalCourse_{{ $course->id }}_edit = false"
                                    class="bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50 flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                                    <span class="text-base">Tutup</span>
                                </button>

                                <button type="submit"
                                    class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                                    <span class="text-base text-white">Simpan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
