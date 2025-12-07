@section('title', 'Kelola QR Absensi')
<x-app-layout>
    <div x-data="{
    course_schedule: '',
    selectedAttendance: null,
    showModalGenerateQR: false,
    allAttendances: {{ Js::from($attendances) }},
    get filteredAttendances() {
    const selectedId = parseInt(this.course_schedule);
    if (!selectedId) return [];
    return this.allAttendances.filter(att => att.courseschedule_id === selectedId);
    }
    }" class="flex flex-col gap-4">

        <div class="flex flex-col justify-center items-start gap-4 w-full">
            <div class="flex flex-col justify-center items-start gap-2">
                <h3 class="text-4xl 2xl:text-5xl font-bold">Kelola QR Absensi</h3>
                <p class="text-[var(--surface-variant)]">Akses dan kelola absensi langsung dari sini</p>
            </div>

            <div class="flex justify-end items-center gap-4 w-full">
                <div class="relative group w-full">
                    <select x-model="course_schedule" id="course_schedule" name="course_schedule"
                        class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                        focus:border-[var(--primary)] focus:ring-0 outline-none cursor-pointer transition-all duration-200"
                        required>
                        <option value="" selected hidden>Pilih Mata Kuliah</option>
                        @foreach($schedules as $cs)
                            <option value="{{ $cs->id }}">
                                {{ Auth::user()->username }} | {{ $cs->classroom->name }} | {{ $cs->course->name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="course_schedule"
                        class="absolute left-2 top-0 -translate-y-1/2 text-gray-400 text-xs bg-white px-1.5 transition-all duration-200 cursor-text
                        group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                        group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                        Mata Kuliah
                    </label>
                </div>

                <!-- Tombol Tambah QR -->
                <button type="button" @click="showModalGenerateQR = true" x-show="course_schedule !== ''" x-transition.opacity
                    class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] px-5 py-3 flex justify-between items-center gap-2 rounded-full cursor-pointer transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        class="h-[26px] w-[26px] 2xl:h-[26px] 2xl:w-[26px] fill-white">
                        <path d="M445.93-445.93H194.02v-68.14h251.91v-252.15h68.14v252.15h252.15v68.14H514.07v251.91h-68.14v-251.91Z" />
                    </svg>
                    <span class="hidden 2xl:block text-base 2xl:text-lg text-white">Tambah</span>
                </button>
            </div>
        </div>

        <!-- List Attendances -->
        <template x-if="course_schedule">
            <div class="flex flex-col gap-2">
                <template x-for="att in filteredAttendances" :key="att.id">
                    <div x-data="{ showModalQR: false, currentAttendance: att }">
                        <button type="button" @click="showModalQR = true; selectedAttendance = currentAttendance.id;"
                            :class="currentAttendance.status != 1
                                ? 'bg-[var(--secondary)] hover:bg-[var(--hover-secondary)] focus:bg-[var(--focus-secondary)] active:bg-[var(--active-secondary)]'
                                : 'bg-[var(--success)] hover:bg-[var(--hover-success)] focus:bg-[var(--focus-success)] active:bg-[var(--active-success)] text-[var(--text-success)]'" class="w-full rounded-md p-4 cursor-pointer transition duration-150 ease-in-out">
                            <span><span x-text="currentAttendance.user.student.npm"></span> | <span x-text="currentAttendance.user.student.classroom.name"></span> | <span x-text="currentAttendance.user.student.fullname"></span></span>
                        </button>

                        <!-- Modal QR -->
                        <div x-show="showModalQR && !splash" @click.self="showModalQR = false" x-transition.opacity x-init="$el.classList.remove('hidden')"
                            class="hidden fixed inset-0 p-4 !z-[9999] flex justify-center items-center bg-black/50"
                            x-cloak>
                            <div class="bg-white min-w-full max-w-full 2xl:min-w-xl 2xl:max-w-xl rounded-3xl flex flex-col" @click.stop>
                                <div class="flex justify-between items-center gap-2 p-6">
                                    <span class="text-2xl">QR Absensi</span>
                                </div>
                                <div class="px-6 flex justify-center items-center">
                                    <div class="bg-[var(--surface-container)] rounded-2xl p-4 flex flex-col justify-center items-center gap-4">
                                        <div class="bg-white p-4 relative flex justify-center items-center rounded-xl">
                                            <div class="relative inline-block select-none cursor-default touch-none">
                                                <img :src="`https://api.qrserver.com/v1/create-qr-code/?size=512x512&color=101-63-153&data=${currentAttendance.id}`"
                                                    alt="QR Absensi"
                                                    class="w-full h-auto 2xl:w-80 2xl:h-80 select-none cursor-default touch-none">
                                                <img src="/img/logo_icon.svg"
                                                    class="absolute inset-0 m-auto w-20 h-20 2xl:w-25 2xl:h-25 p-2 select-none cursor-default touch-none"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="text-[var(--surface-variant)] font-medium text-base 2xl:text-xl flex justify-center items-center gap-2">
                                            <span x-text="currentAttendance.user.student.npm"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center gap-4 p-6">
                                    <form :action="`{{ route('attendances.destroy', '') }}/${currentAttendance.id}`" class="flex justify-start items-center" method="post" @submit="splash = true">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-[var(--error)] hover:bg-[var(--hover-error)] focus:bg-[var(--focus-error)] active:bg-[var(--active-error)] flex justify-center items-center px-3 2xl:px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" class="block 2xl:hidden fill-white"><path d="m251.33-198.29-53.04-53.04L426.96-480 198.29-708.67l53.04-53.04L480-533.04l228.67-228.67 53.04 53.04L533.04-480l228.67 228.67-53.04 53.04L480-426.96 251.33-198.29Z"/></svg>
                                            <span class="hidden 2xl:block text-base text-white">Batalkan QR</span>
                                        </button>
                                    </form>
                                    <div class="flex justify-end items-center gap-2">
                                        <button type="button" @click="showModalQR = false"
                                            class="bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50 flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                                            <span class="text-base">Tutup</span>
                                        </button>
                                        <a href="#" @click="splash = true"
                                            class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                                            <span class="text-base text-white">Periksa</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </template>

        <!-- Modal Generate QR -->
        <template x-if="course_schedule" x-teleport="body">
            <div x-show="showModalGenerateQR && !splash" @click.self="showModalGenerateQR = false" x-transition.opacity
                class="fixed inset-0 p-4 !z-[9999] flex justify-center items-center bg-black/50"
                x-cloak>
                <form action="{{ route('attendances.store') }}" method="POST" @submit="splash = true"
                    class="bg-white min-w-full max-w-full 2xl:min-w-xl 2xl:max-w-xl rounded-3xl flex flex-col" @click.stop>
                    @csrf
                    <input type="hidden" name="courseschedule_id" :value="course_schedule">
                    <div class="flex justify-between items-center gap-2 p-6">
                        <span class="text-2xl">QR Absensi</span>
                    </div>
                    <div class="flex flex-col justify-center items-start gap-4 px-6">
                        <div class="relative group w-full">
                            <select id="student_id" name="student_id"
                                class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                focus:border-[var(--primary)] focus:ring-0 outline-none cursor-pointer transition-all duration-200"
                                required>
                                <option value="" selected hidden>Pilih Mahasiswa</option>
                                @foreach($students as $s)
                                    <option value="{{ $s->npm }}">{{ $s->fullname }} ({{ $s->npm }})</option>
                                @endforeach
                            </select>
                            <label for="student_id"
                                class="absolute left-2 top-0 -translate-y-1/2 text-gray-400 text-xs bg-white px-1.5 transition-all duration-200 cursor-text
                                group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                Nama Lengkap
                            </label>
                        </div>
                    </div>
                    <div class="flex justify-end items-center gap-2 p-6">
                        <button type="button" @click="showModalGenerateQR = false"
                            class="bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50 flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base">Tutup</span>
                        </button>
                        <button type="submit"
                            class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base text-white">Buat QR</span>
                        </button>
                    </div>
                </form>
            </div>
        </template>

    </div>
</x-app-layout>
