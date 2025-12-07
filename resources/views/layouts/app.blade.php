<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | MyGunadarma</title>
    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <!-- TailwindCSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4.1.17/dist/index.global.min.js"></script>
    <!-- Font Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <!-- AlpineJS -->
    <script src="https://unpkg.com/alpinejs@3.15.0/dist/cdn.min.js" defer></script>
    <style>
        /* Template Warna */
        :root {
            /* Primary */
            --primary: rgb(101, 63, 153);
            --hover-primary: rgb(91, 53, 143);
            --focus-primary: rgb(91, 53, 143);
            --active-primary: rgb(81, 43, 133);
            /* Primary Container */
            --primary-container: rgb(226, 210, 231);
            --hover-primary-container: rgb(216, 200, 221);
            --focus-primary-container: rgb(216, 200, 221);
            --active-primary-container: rgb(206, 190, 211);
            /* Secondary */
            --secondary: rgb(248, 250, 253);
            --hover-secondary: rgb(238, 240, 243);
            --focus-secondary: rgb(238, 240, 243);
            --active-secondary: rgb(228, 230, 233);
            --secondary-container: rgb(250, 242, 250);
            --hover-secondary-container: rgb(240, 232, 240);
            --focus-secondary-container: rgb(240, 232, 240);
            --active-secondary-container: rgb(230, 222, 230);
            /* Tertiary */
            --tertiary: rgb(215, 218, 223);
            --hover-tertiary: rgb(205, 208, 213);
            --focus-tertiary: rgb(205, 208, 213);
            --active-tertiary: rgb(195, 198, 203);
            /* Tertiary Container */
            --tertiary-container: rgb(219, 222, 227);
            --hover-tertiary-container: rgb(209, 212, 217);
            --focus-tertiary-container: rgb(209, 212, 217);
            --active-tertiary-container: rgb(199, 202, 207);
            /* Error */
            --error: rgb(210, 44, 44);
            --hover-error: rgb(190, 34, 34);
            --focus-error: rgb(190, 34, 34);
            --active-error: rgb(170, 24, 24);
            --error-container: rgb(252, 221, 221);
            --hover-error-container: rgb(242, 211, 211);
            --focus-error-container: rgb(242, 211, 211);
            --active-error-container: rgb(232, 201, 201);
            /* Surface */
            --surface-container: rgb(240, 244, 249);
            --hover-surface-container: rgb(230, 234, 239);
            --focus-surface-container: rgb(230, 234, 239);
            --active-surface-container: rgb(220, 224, 229);
            --surface-variant: rgb(68, 71, 70);
            --hover-surface-variant: rgb(58, 61, 60);
            --focus-surface-variant: rgb(58, 61, 60);
            --active-surface-variant: rgb(48, 51, 50);
            /* success */
            --success: rgb(161, 232, 202);
            --hover-success: rgb(151, 222, 192);
            --focus-success: rgb(151, 222, 192);
            --active-success: rgb(141, 212, 182);
            --text-success: rgb(23, 94, 65);
        }

        html,
        body {
            /* Set Font Roboto ke HTML */
            font-family: "Roboto", sans-serif;
            /* Biar ga geser kebawah semuanya */
            overflow: hidden;
        }
    </style>
    @if (Route::is('attendances.scanner'))
        <style>
            @keyframes scan {
                0% {
                    top: 0;
                    opacity: 0;
                }

                25% {
                    opacity: 1;
                }

                50% {
                    top: 95%;
                    opacity: 0;
                }

                75% {
                    opacity: 1
                }

                100% {
                    top: 0;
                    opacity: 0;
                }
            }

            .animate-scan {
                animation: scan 3s linear infinite;
            }
        </style>
        <script type="module">
            import {
                BrowserMultiFormatReader
            } from 'https://cdn.jsdelivr.net/npm/@zxing/browser@latest/+esm';

            const codeReader = new BrowserMultiFormatReader();
            const videoElem = document.getElementById('preview');
            let lastDetected = '';
            let useFrontCamera = false;
            let currentStream = null;
            let currentDeviceId = null;

            async function getAvailableCameras() {
                const devices = await navigator.mediaDevices.enumerateDevices();
                return devices.filter(d => d.kind === 'videoinput');
            }

            async function startScanner() {
                try {
                    const cameras = await getAvailableCameras();
                    if (cameras.length === 0) throw new Error('Tidak ada kamera yang terdeteksi.');

                    // Pilih kamera berdasarkan flag
                    const selectedCamera = useFrontCamera ? cameras.at(-1) : cameras[0];
                    currentDeviceId = selectedCamera.deviceId;

                    // Stop stream lama (kalau ada)
                    if (currentStream) {
                        currentStream.getTracks().forEach(t => t.stop());
                        currentStream = null;
                    }

                    // Mulai kamera baru
                    currentStream = await navigator.mediaDevices.getUserMedia({
                        video: {
                            deviceId: {
                                exact: currentDeviceId
                            }
                        },
                    });
                    videoElem.srcObject = currentStream;

                    // Jalankan scanner
                    await codeReader.decodeFromVideoDevice(currentDeviceId, videoElem, (result, err) => {
                        if (result) {
                            const data = result.getText();
                            if (data !== lastDetected) {
                                lastDetected = data;
                                // redirect ke halaman attendance dengan data QR
                                window.location.href = `/attendance/${data}`;
                                setTimeout(() => (lastDetected = ''), 2000);
                            }
                        }
                    });
                } catch (err) {
                    console.error(err);
                    alert('Gagal memulai kamera: ' + err.message);
                }
            }

            async function switchCamera() {
                try {
                    useFrontCamera = !useFrontCamera;
                    await startScanner();
                } catch (err) {
                    console.error(err);
                    alert('Gagal mengganti kamera: ' + err.message);
                }
            }

            window.startScanner = startScanner;
            window.switchCamera = switchCamera;

            window.addEventListener('load', startScanner);
        </script>
    @endif
</head>

<body>
    <div id="app" class="bg-white min-h-dvh max-h-dvh flex flex-col text-[var(--surface-variant)]"
        x-init="setTimeout(() => splash = false, 1500)" x-data="{
            splash: true @if(Route::is('dashboard')),
            showModalAbout: false
            @endif @if(Route::is('todolist')),
            showModalTodoListAdd: false
            @endif @if(Route::is('admin.manage.courses')),
            showModalCourseAdd: false
            @endif @if(Route::is('admin.manage.classrooms')),
            showModalClassroomAdd: false
            @endif @if(Route::is('admin.manage.majors')),
            showModalMajorAdd: false
            @endif @if(Route::is('admin.manage.courseschedule')),
            showModalCourseScheduleAdd: false
            @endif @if(Route::is('admin.manage.lecturers')),
            showModalLecturerAdd: false
            @endif @if(Route::is('admin.manage.employees')),
            showModalEmployeeAdd: false
            @endif @if(Route::is('admin.manage.users')),
            showModalUserAdd: false
            @endif @if(Route::is('admin.manage.students')),
            showModalStudentAdd: false
            @endif
        }">
        <div x-show="splash" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-white flex flex-col items-center justify-center z-50">
            <img src="/img/logo_icon.svg" alt="Gunadarma" class="h-40 w-40">
        </div>
        <div x-show="!splash" x-transition.opacity class="flex min-h-dvh max-h-dvh">
            <div class="w-26 hidden 2xl:flex flex-col px-4 py-6 bg-[var(--surface-container)]">
                <!-- SideBar (Only for Desktop) -->
                @include('layouts.sidebar')
            </div>
            <div class="relative w-full max-h-dvh overflow-y-auto z-0" id="main-container">
                @if (View::getSection('title') == 'Dasbor')
                    <div id="banner" class="absolute inset-0 -z-10">
                        <img src="./img/bg-login.png" alt="Banner Gunadarma"
                            class="aspect-3/2 object-cover object-top h-50 2xl:h-100 w-full">
                    </div>
                @endif
                <!-- Navbar -->
                @include('layouts.navbar')
                <main
                    class="@if (!Route::is('attendances.scanner')) px-4 2xl:px-40 py-4 2xl:py-6 @endif flex flex-col gap-4 2xl:gap-6 min-h-full
                            @if (View::getSection('title') == 'Dasbor') pt-35 2xl:pt-80 @endif
                            ">
                    {{ $slot }}
                </main>
                <!-- Navigation Footer (Only for Mobile) -->
                @if (Route::is('dashboard'))
                    @include('layouts.footnav-menu')
                @endif
            </div>
        </div>
        @if (Route::is('dashboard'))
            <div x-show="showModalAbout && !splash" @click.self="showModalAbout = false" x-transition.opacity
                x-init="$el.classList.remove('hidden')"
                class="hidden fixed inset-0 p-4 !z-[9999] flex justify-center items-center bg-black/50" x-cloak>
                <div class="bg-white min-w-full max-w-full 2xl:min-w-xl 2xl:max-w-xl rounded-3xl flex flex-col"
                    @click.stop>
                    <div class="flex justify-between items-center gap-2 p-6">
                        <span class="text-2xl">Tentang Aplikasi</span>
                    </div>
                    <div class="flex flex-col justify-center items-start gap-4 px-6">
                        <p>Aplikasi MyGunadarma ini dikembangkan oleh Kelompok 4 sebagai bagian dari penilaian Tugas dan
                            Ujian Tengah Semester pada mata kuliah Konsep Sistem & Teknologi Sistem Informasi C.</p>
                        <span>Nama & NPM dari Anggota :</span>
                        <div class="overflow-auto overflow-y-hidden max-h-full h-full w-full py-1">
                            <ul class="flex flex-col gap-2 w-full min-w-max">
                                <li><span class="bg-black p-1 text-white font-medium rounded">[UI/UX Designer]</span>
                                    DESKA
                                    BINTANG EKA HARPUTRA (10125244)</li>
                                <li><span class="bg-orange-500 p-1 text-white font-medium rounded">[Frontend
                                        Developer]</span> MUHAMMAD ZIDANE FEBRIAN (10125749)</li>
                                <li><span class="bg-orange-500 p-1 text-white font-medium rounded">[Frontend
                                        Developer]</span> NADIA PUTRI SALSABILA (10125766)</li>
                                <li><span class="bg-black p-1 text-white font-medium rounded">[UI/UX Designer]</span>
                                    OKTASYAH BINTANG RAMADHAN (10125834)</li>
                                <li><span class="bg-yellow-500 p-1 text-white font-medium rounded">[Fullstack
                                        Developer]</span>
                                    RAFIE RESTU RAMADHANI (10125885)</li>
                                <li><span class="bg-orange-500 p-1 text-white font-medium rounded">[Frontend
                                        Developer]</span> RAFLI (10125887)</li>
                                <li><span class="bg-black p-1 text-white font-medium rounded">[UI/UX Designer]</span>
                                    RANGGA PASYA YUANZA (10125908)</li>
                                <li><span class="bg-red-500 p-1 text-white font-medium rounded">[Backend
                                        Engineer]</span>
                                    REISYA AHMAD PRIYATAMA (10125939)</li>
                                <li><span class="bg-red-500 p-1 text-white font-medium rounded">[Backend
                                        Engineer]</span>
                                    WINNI ASSYIFA (11125101)</li>
                            </ul>
                        </div>

                    </div>
                    <div class="flex justify-end items-center gap-2 p-6">
                        <button type="button" @click="showModalAbout = false"
                            class="bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50 flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base">Tutup</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        @if (Route::is('todolist'))
            <div x-show="showModalTodoListAdd && !splash" @click.self="showModalTodoListAdd = false"
                x-transition.opacity x-init="$el.classList.remove('hidden')"
                class="hidden fixed inset-0 p-4 !z-[9999] flex justify-center items-center bg-black/50" x-cloak>

                <form action="{{ route('todolist') }}" method="POST" @submit="splash = true"
                    class="bg-white min-w-full max-w-full 2xl:min-w-xl 2xl:max-w-xl rounded-3xl flex flex-col"
                    @click.stop>

                    @csrf

                    <div class="flex justify-between items-center gap-2 p-6">
                        <span class="text-2xl">Tambah To-Do</span>
                    </div>

                    <div class="flex flex-col justify-center items-start gap-4 px-6">

                        {{-- Title --}}
                        <div class="relative group w-full">
                            <input type="text" id="title" name="title" placeholder=" "
                                value="{{ old('title') }}"
                                class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                    focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                required />

                            <label for="title"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                    group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                    group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                Judul
                            </label>
                        </div>

                        {{-- Description --}}
                        <div class="relative group w-full">
                            <textarea id="desc" name="desc" placeholder=" "
                                class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                    focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200">{{ old('desc') }}</textarea>

                            <label for="desc"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                    group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                    group-has-[textarea:not(:placeholder-shown)]:top-0 group-has-[textarea:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                Deskripsi
                            </label>
                        </div>

                        {{-- Deadline + Priority --}}
                        <div class="grid grid-cols-2 gap-4 w-full">

                            {{-- Deadline --}}
                            <div class="relative group w-full">
                                <input type="date" id="deadline" name="deadline" placeholder=" "
                                    value="{{ old('deadline') }}"
                                    class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                        focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                    required />

                                <label for="deadline"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                        group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                        group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                    Tenggat Waktu
                                </label>
                            </div>

                            {{-- Priority --}}
                            <div class="relative group w-full">
                                <select id="priority" name="priority"
                                    class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                        focus:border-[var(--primary)] focus:ring-0 outline-none cursor-pointer transition-all duration-200"
                                    required>

                                    <option value="0" {{ old('priority') == '0' ? 'selected' : '' }}>Unknown
                                    </option>
                                    <option value="1" {{ old('priority') == '1' ? 'selected' : '' }}>Low</option>
                                    <option value="2" {{ old('priority') == '2' ? 'selected' : '' }}>Medium
                                    </option>
                                    <option value="3" {{ old('priority') == '3' ? 'selected' : '' }}>High</option>
                                    <option value="4" {{ old('priority') == '4' ? 'selected' : '' }}>Urgent
                                    </option>
                                </select>

                                <label for="priority"
                                    class="absolute left-2 top-0 -translate-y-1/2 text-gray-400 text-xs bg-white px-1.5 transition-all duration-200 cursor-text
                        group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                        group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                    Prioritas
                                </label>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="relative group w-full">
                            <select id="status" name="status"
                                class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                    focus:border-[var(--primary)] focus:ring-0 outline-none cursor-pointer transition-all duration-200"
                                required>

                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>On Progress
                                </option>
                                <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Done</option>
                                <option value="3" {{ old('status') == '3' ? 'selected' : '' }}>Canceled</option>
                            </select>

                            <label for="status"
                                class="absolute left-2 top-0 -translate-y-1/2 text-gray-400 text-xs bg-white px-1.5 transition-all duration-200 cursor-text
                    group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                    group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                Status
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end items-center gap-2 p-6">
                        <button type="button" @click="showModalTodoListAdd = false"
                            class="bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50 flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base">Tutup</span>
                        </button>

                        <button type="submit"
                            class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base text-white">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        @endif
        @if (Route::is('admin.manage.courseschedule'))
            <div x-show="showModalCourseScheduleAdd && !splash" @click.self="showModalCourseScheduleAdd = false"
                x-transition.opacity x-init="$el.classList.remove('hidden')"
                class="hidden fixed inset-0 p-4 !z-[9999] flex justify-center items-center bg-black/50" x-cloak>

                <form action="{{ route('admin.manage.courseschedule.store') }}" method="POST"
                    @submit="splash = true"
                    class="bg-white min-w-full max-w-full 2xl:min-w-xl 2xl:max-w-xl rounded-3xl flex flex-col"
                    @click.stop>

                    @csrf

                    <div class="flex justify-between items-center gap-2 p-6">
                        <span class="text-2xl">Tambah Jadwal Mata Kuliah</span>
                    </div>

                    <div class="flex flex-col justify-center items-start gap-4 px-6">
                        <div class="relative group w-full">
                            <select id="classroom_id" name="classroom_id"
                                class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                focus:border-[var(--primary)] focus:ring-0 outline-none cursor-pointer transition-all duration-200"
                                required>
                                <option value="" hidden>Pilih Kelas</option>
                                @foreach (App\Models\Classroom::all() as $classroom)
                                    <option value="{{ $classroom->id }}">
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
                                @foreach (App\Models\Courses::all() as $course)
                                    <option value="{{ $course->id }}">
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
                                    <option value="1">Senin</option>
                                    <option value="2">Selasa</option>
                                    <option value="3">Rabu</option>
                                    <option value="4">Kamis</option>
                                    <option value="5">Jumat</option>
                                    <option value="6">Sabtu</option>
                                    <option value="7">Minggu</option>
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
                                    <option value="0">1</option>
                                    <option value="1">2</option>
                                    <option value="2">3</option>
                                    <option value="3">4</option>
                                    <option value="4">5</option>
                                    <option value="5">6</option>
                                    <option value="6">7</option>
                                    <option value="7">8</option>
                                    <option value="8">9</option>
                                    <option value="9">10</option>
                                    <option value="10">11</option>
                                    <option value="11">12</option>
                                    <option value="12">13</option>
                                    <option value="13">14</option>
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
                                <option value="" hidden>Pilih Dosen</option>
                                @foreach (App\Models\Lecturer::all() as $lecturer)
                                    <option value="{{ $lecturer->nidn }}">
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
                        <button type="button" @click="showModalCourseScheduleAdd = false"
                            class="bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50 flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base">Tutup</span>
                        </button>

                        <button type="submit"
                            class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base text-white">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        @endif
        @if (Route::is('admin.manage.courses'))
            <div x-show="showModalCourseAdd && !splash" @click.self="showModalCourseAdd = false" x-transition.opacity
                x-init="$el.classList.remove('hidden')"
                class="hidden fixed inset-0 p-4 !z-[9999] flex justify-center items-center bg-black/50" x-cloak>

                <form action="{{ route('admin.manage.courses.store') }}" method="POST" @submit="splash = true"
                    class="bg-white min-w-full max-w-full 2xl:min-w-xl 2xl:max-w-xl rounded-3xl flex flex-col"
                    @click.stop>

                    @csrf

                    <div class="flex justify-between items-center gap-2 p-6">
                        <span class="text-2xl">Tambah Mata Kuliah</span>
                    </div>

                    <div class="flex flex-col justify-center items-start gap-4 px-6">
                        {{-- Course Name --}}
                        <div class="relative group w-full">
                            <input type="text" id="name" name="name" placeholder=" "
                                value="{{ old('name') }}"
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
                        <button type="button" @click="showModalCourseAdd = false"
                            class="bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50 flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base">Tutup</span>
                        </button>

                        <button type="submit"
                            class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base text-white">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        @endif
        @if (Route::is('admin.manage.lecturers'))
            <div x-show="showModalLecturerAdd && !splash" @click.self="showModalLecturerAdd = false"
                x-transition.opacity x-init="$el.classList.remove('hidden')"
                class="hidden fixed inset-0 p-4 !z-[9999] flex justify-center items-center bg-black/50" x-cloak>

                <form action="{{ route('admin.manage.lecturers.store') }}" method="POST" @submit="splash = true"
                    class="bg-white min-w-full max-w-full 2xl:min-w-xl 2xl:max-w-xl rounded-3xl flex flex-col"
                    @click.stop>
                    @csrf
                    <div class="flex justify-between items-center gap-2 p-6">
                        <span class="text-2xl">Tambah Dosen</span>
                    </div>
                    <div class="flex flex-col justify-center items-start gap-4 px-6">
                        <div class="relative group w-full">
                            <input type="text" id="nidn" name="nidn" placeholder=" "
                                class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                required />

                            <label for="nidn"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                                group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                NIDN
                            </label>
                        </div>
                        <div class="relative group w-full">
                            <input type="text" id="fullname" name="fullname" placeholder=" "
                                class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                required />

                            <label for="fullname"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                                group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                Nama Dosen
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end items-center gap-2 p-6">
                        <button type="button" @click="showModalLecturerAdd = false"
                            class="bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50 flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base">Tutup</span>
                        </button>

                        <button type="submit"
                            class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base text-white">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        @endif
        @if (Route::is('admin.manage.users'))
            <div x-show="showModalUserAdd && !splash" @click.self="showModalUserAdd = false"
                x-transition.opacity x-init="$el.classList.remove('hidden')"
                class="hidden fixed inset-0 p-4 !z-[9999] flex justify-center items-center bg-black/50" x-cloak>

                <form action="{{ route('admin.manage.users.store') }}" method="POST" @submit="splash = true"
                    class="bg-white min-w-full max-w-full 2xl:min-w-xl 2xl:max-w-xl rounded-3xl flex flex-col"
                    @click.stop>
                    @csrf
                    <div class="flex justify-between items-center gap-2 p-6">
                        <span class="text-2xl">Tambah Pengguna</span>
                    </div>
                    <div class="flex flex-col justify-center items-start gap-4 px-6">
                        <div class="relative group w-full">
                            <select id="username" name="username"
                                class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                focus:border-[var(--primary)] focus:ring-0 outline-none cursor-pointer transition-all duration-200"
                                required>
                                <option value="" hidden>Pilih NPM / NIDN / NIP</option>
                                @foreach (App\Models\Student::all() as $student)
                                    <option value="{{ $student->npm }}">
                                        Mahasiswa | {{ $student->npm }} | {{ $student->fullname }}
                                    </option>
                                @endforeach
                                @foreach (App\Models\Lecturer::all() as $lecturer)
                                    <option value="{{ $lecturer->nidn }}">
                                        Dosen | {{ $lecturer->nidn }} | {{ $lecturer->fullname }}
                                    </option>
                                @endforeach
                                @foreach (App\Models\Employee::all() as $employee)
                                    <option value="{{ $employee->nip }}">
                                        Pegawai | {{ $employee->nip }} | {{ $employee->fullname }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="username"
                                class="absolute left-2 top-0 -translate-y-1/2 text-gray-400 text-xs bg-white px-1.5 transition-all duration-200 cursor-text
                                group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                NPM / NIDN / NIP
                            </label>
                        </div>
                        <div class="flex justify-center items-center gap-4 w-full">
                            <div class="relative group w-full">
                                <input data-password type="password" id="password" name="password" placeholder=" "
                                    class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                    focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                    required />

                                <label for="password"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                                    group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                    group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                    Kata Sandi
                                </label>
                            </div>
                            <div class="relative group w-full">
                                <input data-password type="password" id="password_confirmation" name="password_confirmation" placeholder=" "
                                    class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                    focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                    required />

                                <label for="password_confirmation"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                                    group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                    group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                    Ulangi Kata Sandi
                                </label>
                            </div>
                        </div>
                        <div
                            x-data="{ show: false }"
                            x-effect="
                                document.querySelectorAll('[data-password]').forEach(el => {
                                    el.type = show ? 'text' : 'password';
                                });
                            "
                            class="flex justify-start items-center gap-2 select-none"
                        >
                            <label for='showpassword' class='flex justify-center items-center border border-gray-400 rounded-sm p-px cursor-pointer'>
                                <input
                                    type='checkbox'
                                    id='showpassword'
                                    x-model='show'
                                    class='appearance-none checked:bg-[var(--primary)] p-2 rounded-sm transition-all duration-200 cursor-pointer'
                                >
                            </label>
                            <label for='showpassword' class='text-base cursor-pointer'>Tampilkan Kata Sandi</label>
                        </div>
                    </div>

                    <div class="flex justify-end items-center gap-2 p-6">
                        <button type="button" @click="showModalUserAdd = false"
                            class="bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50 flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base">Tutup</span>
                        </button>

                        <button type="submit"
                            class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base text-white">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        @endif
        @if (Route::is('admin.manage.students'))
            <div x-show="showModalStudentAdd && !splash" @click.self="showModalStudentAdd = false"
                x-transition.opacity x-init="$el.classList.remove('hidden')"
                class="hidden fixed inset-0 p-4 !z-[9999] flex justify-center items-center bg-black/50" x-cloak>

                <form action="{{ route('admin.manage.students.store') }}" method="POST" @submit="splash = true"
                    class="bg-white min-w-full max-w-full 2xl:min-w-xl 2xl:max-w-xl rounded-3xl flex flex-col"
                    @click.stop>
                    @csrf
                    <div class="flex justify-between items-center gap-2 p-6">
                        <span class="text-2xl">Tambah Mahasiswa</span>
                    </div>
                    <div class="flex flex-col justify-center items-start gap-4 px-6">
                        <div class="relative group w-full">
                            <input type="npm" id="npm" name="npm" placeholder=" "
                                class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                required />

                            <label for="npm"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                                group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                NPM
                            </label>
                        </div>
                        <div class="relative group w-full">
                            <input type="fullname" id="fullname" name="fullname" placeholder=" "
                                class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                required />

                            <label for="fullname"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                                group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                Nama Lengkap
                            </label>
                        </div>
                        <div class="flex justify-center items-center gap-4 w-full">
                            <div class="relative group w-full">
                                <select id="major_id" name="major_id"
                                    class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                    focus:border-[var(--primary)] focus:ring-0 outline-none cursor-pointer transition-all duration-200"
                                    required>
                                    <option value="" hidden>Pilih Jurusan</option>
                                    @foreach (App\Models\Major::all() as $major)
                                        <option value="{{ $major->id }}">
                                            {{ $major->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="major_id"
                                    class="absolute left-2 top-0 -translate-y-1/2 text-gray-400 text-xs bg-white px-1.5 transition-all duration-200 cursor-text
                                    group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                    group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                    Jurusan
                                </label>
                            </div>
                            <div class="relative group w-full">
                                <select id="classroom_id" name="classroom_id"
                                    class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                    focus:border-[var(--primary)] focus:ring-0 outline-none cursor-pointer transition-all duration-200"
                                    required>
                                    <option value="" hidden>Pilih Kelas</option>
                                    @foreach (App\Models\Classroom::all() as $classroom)
                                        <option value="{{ $classroom->id }}">
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
                        </div>
                    </div>

                    <div class="flex justify-end items-center gap-2 p-6">
                        <button type="button" @click="showModalStudentAdd = false"
                            class="bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50 flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base">Tutup</span>
                        </button>

                        <button type="submit"
                            class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base text-white">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        @endif
        @if (Route::is('admin.manage.employees'))
            <div x-show="showModalEmployeeAdd && !splash" @click.self="showModalEmployeeAdd = false"
                x-transition.opacity x-init="$el.classList.remove('hidden')"
                class="hidden fixed inset-0 p-4 !z-[9999] flex justify-center items-center bg-black/50" x-cloak>

                <form action="{{ route('admin.manage.employees.store') }}" method="POST" @submit="splash = true"
                    class="bg-white min-w-full max-w-full 2xl:min-w-xl 2xl:max-w-xl rounded-3xl flex flex-col"
                    @click.stop>
                    @csrf
                    <div class="flex justify-between items-center gap-2 p-6">
                        <span class="text-2xl">Tambah Pegawai</span>
                    </div>
                    <div class="flex flex-col justify-center items-start gap-4 px-6">
                        <div class="relative group w-full">
                            <input type="text" id="nip" name="nip" placeholder=" "
                                class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                required />

                            <label for="nip"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                                group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                NIP
                            </label>
                        </div>
                        <div class="relative group w-full">
                            <input type="text" id="fullname" name="fullname" placeholder=" "
                                class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                required />

                            <label for="fullname"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                                group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                Nama Pegawai
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end items-center gap-2 p-6">
                        <button type="button" @click="showModalEmployeeAdd = false"
                            class="bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50 flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base">Tutup</span>
                        </button>

                        <button type="submit"
                            class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base text-white">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        @endif
        @if (Route::is('admin.manage.majors'))
            <div x-show="showModalMajorAdd && !splash" @click.self="showModalMajorAdd = false" x-transition.opacity
                x-init="$el.classList.remove('hidden')"
                class="hidden fixed inset-0 p-4 !z-[9999] flex justify-center items-center bg-black/50" x-cloak>

                <form action="{{ route('admin.manage.majors.store') }}" method="POST" @submit="splash = true"
                    class="bg-white min-w-full max-w-full 2xl:min-w-xl 2xl:max-w-xl rounded-3xl flex flex-col"
                    @click.stop>

                    @csrf

                    <div class="flex justify-between items-center gap-2 p-6">
                        <span class="text-2xl">Tambah Jurusan</span>
                    </div>

                    <div class="flex flex-col justify-center items-start gap-4 px-6">
                        {{-- Course Name --}}
                        <div class="relative group w-full">
                            <input type="text" id="name" name="name" placeholder=" "
                                value="{{ old('name') }}"
                                class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                    focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                required />

                            <label for="name"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                    group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                    group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                Nama Jurusan
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end items-center gap-2 p-6">
                        <button type="button" @click="showModalMajorAdd = false"
                            class="bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50 flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base">Tutup</span>
                        </button>

                        <button type="submit"
                            class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base text-white">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        @endif
        @if (Route::is('admin.manage.classrooms'))
            <div x-show="showModalClassroomAdd && !splash" @click.self="showModalClassroomAdd = false"
                x-transition.opacity x-init="$el.classList.remove('hidden')"
                class="hidden fixed inset-0 p-4 !z-[9999] flex justify-center items-center bg-black/50" x-cloak>

                <form action="{{ route('admin.manage.classrooms.store') }}" method="POST" @submit="splash = true"
                    class="bg-white min-w-full max-w-full 2xl:min-w-xl 2xl:max-w-xl rounded-3xl flex flex-col"
                    @click.stop>

                    @csrf

                    <div class="flex justify-between items-center gap-2 p-6">
                        <span class="text-2xl">Tambah Kelas</span>
                    </div>

                    <div class="flex flex-col justify-center items-start gap-4 px-6">
                        {{-- Classroom Name --}}
                        <div class="relative group w-full">
                            <input type="text" id="name" name="name" placeholder=" "
                                value="{{ old('name') }}"
                                class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                    focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                required />

                            <label for="name"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                    group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                    group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                Nama Kelas
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end items-center gap-2 p-6">
                        <button type="button" @click="showModalClassroomAdd = false"
                            class="bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50 flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base">Tutup</span>
                        </button>

                        <button type="submit"
                            class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <span class="text-base text-white">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        @endif
    </div>
    @if (Route::is('dashboard'))
        <script>
            // Javascript Navbar
            const container = document.getElementById('main-container');
            const nav = document.querySelector('nav');

            container.addEventListener('scroll', () => {
                if (container.scrollTop > 0) {
                    nav.classList.add('bg-white');
                } else {
                    nav.classList.remove('bg-white');
                }
            });
        </script>
    @endif
</body>

</html>
