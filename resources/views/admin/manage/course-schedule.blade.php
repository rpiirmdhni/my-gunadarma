@section('title', 'Kelola Jadwal Mata Kuliah')
<x-app-layout>
    <div class="flex flex-col justify-center items-start gap-4 w-full">
        <div class="flex flex-col justify-center items-start gap-2">
            <h3 class="text-4xl 2xl:text-5xl font-bold">Kelola Jadwal Mata Kuliah</h3>
            <p class="text-[var(--surface-variant)]">Akses dan kelola Jadwal Mata Kuliah langsung dari sini</p>
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
                    Cari Jadwal Mata Kuliah
                </label>
            </div>-->
            <button type="button" @click="showModalCourseScheduleAdd = true"
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
        @foreach ($course_schedule as $cs)
            <div
                class="bg-[var(--secondary)] p-4 flex flex-col justify-between items-center gap-8 rounded-2xl transition duration-150 ease-in-out">
                <div class="flex flex-col justify-center items-start w-full gap-4">
                    <h3 class="text-xl 2xl:text-2xl font-bold text-start">
                        {{ \App\Models\Courses::find($cs->course_id)->name }}</h3>
                    <div class="flex flex-col justify-center items-start gap-2">
                        <div class="flex items-center gap-2">
                            <span
                                class="px-2 py-1 text-sm rounded-md text-white bg-[var(--primary)]">{{ \App\Models\Classroom::find($cs->classroom_id)->name }}</span>
                            <span
                                class="px-2 py-1 text-sm rounded-md text-white bg-orange-500 truncate">{{ \App\Models\Lecturer::find($cs->lecturer_id)->fullname }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="px-2 py-1 text-sm rounded-md text-white bg-gray-500">
                                @if ($cs->day == 1)
                                    Senin
                                @endif
                                @if ($cs->day == 2)
                                    Selasa
                                @endif
                                @if ($cs->day == 3)
                                    Rabu
                                @endif
                                @if ($cs->day == 4)
                                    Kamis
                                @endif
                                @if ($cs->day == 5)
                                    Jumat
                                @endif
                                @if ($cs->day == 6)
                                    Sabtu
                                @endif
                                @if ($cs->day == 7)
                                    Minggu
                                @endif
                            </span>
                            <span class="px-2 py-1 text-sm rounded-md text-white bg-gray-500">
                                @if ($cs->course_time == 0)
                                    07:30 - 08:30
                                @endif
                                @if ($cs->course_time == 1)
                                    08:30 - 09:30
                                @endif
                                @if ($cs->course_time == 2)
                                    09:30 - 10:30
                                @endif
                                @if ($cs->course_time == 3)
                                    10:30 - 11:30
                                @endif
                                @if ($cs->course_time == 4)
                                    11:30 - 12:30
                                @endif
                                @if ($cs->course_time == 5)
                                    12:30 - 13:30
                                @endif
                                @if ($cs->course_time == 6)
                                    13:30 - 14:30
                                @endif
                                @if ($cs->course_time == 7)
                                    14:30 - 15:30
                                @endif
                                @if ($cs->course_time == 8)
                                    15:30 - 16:30
                                @endif
                                @if ($cs->course_time == 9)
                                    16:30 - 17:30
                                @endif
                                @if ($cs->course_time == 10)
                                    17:30 - 18:30
                                @endif
                                @if ($cs->course_time == 11)
                                    18:30 - 19:30
                                @endif
                                @if ($cs->course_time == 12)
                                    19:30 - 20:30
                                @endif
                                @if ($cs->course_time == 13)
                                    20:30 - 21:30
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end items-center gap-2 w-full" x-data="{ showModalCourseSchedule_{{ $cs->id }}_edit: false }">
                    <button type="button" @click="showModalCourseSchedule_{{ $cs->id }}_edit = true"
                        class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] px-5 py-3 flex justify-center items-center gap-2 rounded-full cursor-pointer transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" height="20px" width="20px"
                            class="fill-white">
                            <path
                                d="M188.82-189.06h48.57l431.45-430.78-48.09-48.33-431.93 431.1v48.01ZM113.3-113.3v-154.76l558.86-558.09q9.65-9.56 22.43-14.8t26.72-5.24q13.15 0 26.04 5.24 12.89 5.24 23.35 14.89l56.36 55.97q10.32 10.39 15.1 23.4 4.77 13.01 4.77 26.14 0 13.38-5.11 26.48t-14.76 22.91L268.38-113.3H113.3Zm655.06-607.92-46.24-46.48 46.24 46.48Zm-123.61 77.14-24-24.09 48.09 48.33-24.09-24.24Z" />
                        </svg>
                    </button>
                    <form action="{{ route('admin.manage.courseschedule.destroy', $cs->id) }}" method="post">
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
                    <div x-show="showModalCourseSchedule_{{ $cs->id }}_edit && !splash"
                        @click.self="showModalCourseSchedule_{{ $cs->id }}_edit = false" x-transition.opacity
                        x-init="$el.classList.remove('hidden')"
                        class="hidden fixed inset-0 p-4 !z-[9999] flex justify-center items-center bg-black/50" x-cloak>

                        <form action="{{ route('admin.manage.courseschedule.update', $cs->id) }}" method="POST"
                            @submit="splash = true"
                            class="bg-white min-w-full max-w-full 2xl:min-w-xl 2xl:max-w-xl rounded-3xl flex flex-col"
                            @click.stop>

                            @csrf
                            @method('put')

                            <div class="flex justify-between items-center gap-2 p-6">
                                <span class="text-2xl">Edit Jadwal Mata Kuliah</span>
                            </div>

                            <div class="flex flex-col justify-center items-start gap-4 px-6">
                                <div class="relative group w-full">
                                    <select id="classroom_id" name="classroom_id"
                                        class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                        focus:border-[var(--primary)] focus:ring-0 outline-none cursor-pointer transition-all duration-200"
                                        required>
                                        <option value="" hidden>Pilih Kelas</option>
                                        @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}"
                                                {{ $classroom->id == $cs->classroom_id ? 'selected' : '' }}>
                                                {{ $classroom->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="classroom_id"
                                        class="absolute left-2 top-0 -translate-y-1/2 text-gray-400 text-xs bg-white px-1.5 transition-all duration-200 cursor-text
                                        group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                        group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                        Kelas
                                    </label>
                                </div>
                                <div class="relative group w-full">
                                    <select id="course_id" name="course_id"
                                        class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                        focus:border-[var(--primary)] focus:ring-0 outline-none cursor-pointer transition-all duration-200"
                                        required>
                                        <option value="" hidden>Pilih Mata Kuliah</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}"
                                                {{ $course->id == $cs->course_id ? 'selected' : '' }}>
                                                {{ $course->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="course_id"
                                        class="absolute left-2 top-0 -translate-y-1/2 text-gray-400 text-xs bg-white px-1.5 transition-all duration-200 cursor-text
                                        group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                        group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                        Mata Kuliah
                                    </label>
                                </div>
                                <div class="grid grid-cols-2 gap-4 w-full">
                                    <div class="relative group w-full">
                                        <select id="day" name="day"
                                            class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                            focus:border-[var(--primary)] focus:ring-0 outline-none cursor-pointer transition-all duration-200"
                                            required>
                                            <option value="" hidden>Pilih Hari</option>
                                            <option value="" hidden>Pilih Hari</option>
                                            <option value="1" {{ $cs->day == 1 ? 'selected' : '' }}>Senin</option>
                                            <option value="2" {{ $cs->day == 2 ? 'selected' : '' }}>Selasa
                                            </option>
                                            <option value="3" {{ $cs->day == 3 ? 'selected' : '' }}>Rabu</option>
                                            <option value="4" {{ $cs->day == 4 ? 'selected' : '' }}>Kamis</option>
                                            <option value="5" {{ $cs->day == 5 ? 'selected' : '' }}>Jumat</option>
                                            <option value="6" {{ $cs->day == 6 ? 'selected' : '' }}>Sabtu</option>
                                            <option value="7" {{ $cs->day == 7 ? 'selected' : '' }}>Minggu
                                            </option>
                                        </select>
                                        <label for="day"
                                            class="absolute left-2 top-0 -translate-y-1/2 text-gray-400 text-xs bg-white px-1.5 transition-all duration-200 cursor-text
                                            group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                            group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                            Hari
                                        </label>
                                    </div>
                                    <div class="relative group w-full">
                                        <select id="course_time" name="course_time"
                                            class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                            focus:border-[var(--primary)] focus:ring-0 outline-none cursor-pointer transition-all duration-200"
                                            required>
                                            <option value="" hidden>Pilih Jam Kuliah</option>
                                            @for ($i = 0; $i <= 13; $i++)
                                                <option value="{{ $i }}"
                                                    {{ $i == $cs->course_time ? 'selected' : '' }}>
                                                    {{ $i + 1 }}
                                                </option>
                                            @endfor
                                        </select>
                                        <label for="course_time"
                                            class="absolute left-2 top-0 -translate-y-1/2 text-gray-400 text-xs bg-white px-1.5 transition-all duration-200 cursor-text
                                            group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                            group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                            Jam Kuliah
                                        </label>
                                    </div>
                                </div>
                                <div class="relative group w-full">
                                    <select id="lecturer_id" name="lecturer_id"
                                        class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                        focus:border-[var(--primary)] focus:ring-0 outline-none cursor-pointer transition-all duration-200"
                                        required>
                                        <option value="" selected hidden>Pilih Dosen</option>
                                        @foreach ($lecturers as $lecturer)
                                            <option value="{{ $lecturer->nidn }}"
                                                {{ $lecturer->nidn == $cs->lecturer_id ? 'selected' : '' }}>
                                                {{ $lecturer->nidn }} | {{ $lecturer->fullname }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="lecturer_id"
                                        class="absolute left-2 top-0 -translate-y-1/2 text-gray-400 text-xs bg-white px-1.5 transition-all duration-200 cursor-text
                                        group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                        group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                        Nama Dosen
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-end items-center gap-2 p-6">
                                <button type="button"
                                    @click="showModalCourseSchedule_{{ $cs->id }}_edit = false"
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
