{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | MyGunadarma</title>
    <!-- TailwindCSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
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
        }

        html,
        body {
            /* Set Font Roboto ke HTML */
            font-family: "Roboto", sans-serif;
            /* Biar ga geser kebawah semuanya */
            overflow: hidden;
        }

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
</head>

<body>
    <div id="app" class="bg-white min-h-dvh max-h-dvh flex flex-col text-[var(--surface-variant)]"
        x-data="{ showModalTodoListAdd: false }">
        <div class="flex min-h-dvh max-h-dvh">
            <div class="w-25 hidden 2xl:flex flex-col px-4 py-6">
                <!-- SideBar (Only for Desktop) -->
                <div class="flex flex-col flex-grow justify-between items-center">
                    <div class="flex flex-col gap-4 w-full">
                        <a href="index.html" class="flex flex-col justify-center items-center gap-3 group">
                            <div
                                class="bg-[var(--primary-container)] group-hover:bg-[var(--hover-primary-container)] group-focus:bg-[var(--focus-primary-container)] group-active:bg-[var(--active-primary-container)] flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960"
                                    width="26px"
                                    class="fill-[var(--primary)] group-hover:fill-[var(--hover-primary)] group-focus:fill-[var(--focus-primary)] group-active:fill-[var(--active-primary)] transition duration-150 ease-in-out">
                                    <path
                                        d="M145.87-105.87v-501.29L480-858.09l334.7 250.74v501.48H563.39v-297.52H396.61v297.52H145.87Z" />
                                </svg>
                            </div>
                            <span
                                class="text-sm font-semibold text-[var(--primary)] transition duration-150 ease-in-out">Beranda</span>
                        </a>
                        <a href="" class="flex flex-col justify-center items-center gap-3 group">
                            <div
                                class="bg-transparent group-hover:bg-[var(--hover-tertiary)]/50 group-focus:bg-[var(--focus-tertiary)]/50 group-active:bg-[var(--active-tertiary)]/50 flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960"
                                    width="26px" class="fill-[var(--surface-variant)]">
                                    <path
                                        d="M74.02-704.37v-181.85h181.61v68.37H142.15v113.48H74.02Zm0 630.35v-181.61h68.13v113.48h113.48v68.13H74.02Zm630.35 0v-68.13h113.48v-113.48h68.37v181.61H704.37Zm113.48-630.35v-113.48H704.37v-68.37h181.85v181.85h-68.37ZM708-251h63v63h-63v-63Zm0-126h63v63h-63v-63Zm-63 63h63v63h-63v-63Zm-63 63h63v63h-63v-63Zm-63-63h63v63h-63v-63Zm126-126h63v63h-63v-63Zm-63 63h63v63h-63v-63Zm-63-63h63v63h-63v-63Zm252-332v252H519v-252h252ZM440-440v252H188v-252h252Zm0-332v252H188v-252h252Zm-52.63 531.37v-146.74H240.63v146.74h146.74Zm0-332v-146.74H240.63v146.74h146.74Zm331 0v-146.74H571.63v146.74h146.74Z" />
                                </svg>
                            </div>
                            <span
                                class="text-sm font-medium text-[var(--surface-variant)] transition duration-150 ease-in-out">Absensi</span>
                        </a>
                        <a href="" class="flex flex-col justify-center items-center gap-3 group">
                            <div
                                class="bg-transparent group-hover:bg-[var(--hover-tertiary)]/50 group-focus:bg-[var(--focus-tertiary)]/50 group-active:bg-[var(--active-tertiary)]/50 flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960"
                                    width="26px" class="fill-[var(--surface-variant)]">
                                    <path
                                        d="M640.48-114.02q-34.52 0-58.93-24.35-24.42-24.34-24.42-58.76v-159.76q0-34.2 24.42-58.65Q605.96-440 640.48-440H800q34.52 0 58.93 24.46 24.42 24.45 24.42 58.65v159.76q0 34.42-24.42 58.76-24.41 24.35-58.93 24.35H640.48Zm-14.98-68.13h189.48v-189.72H625.5v189.72ZM74.02-242.83v-68.37h362.87v68.37H74.02ZM640.48-520q-34.52 0-58.93-24.41-24.42-24.42-24.42-58.94v-159.52q0-34.52 24.42-58.93 24.41-24.42 58.93-24.42H800q34.52 0 58.93 24.42 24.42 24.41 24.42 58.93v159.52q0 34.52-24.42 58.94Q834.52-520 800-520H640.48Zm-14.98-68.37h189.48v-189.48H625.5v189.48ZM74.02-649.04v-68.13h362.87v68.13H74.02Zm646.22 372.15Zm0-406.22Z" />
                                </svg>
                            </div>
                            <span
                                class="text-sm font-medium text-[var(--surface-variant)] transition duration-150 ease-in-out">To-Do
                                List</span>
                        </a>
                        <a href="" class="flex flex-col justify-center items-center gap-3 group">
                            <div
                                class="bg-transparent group-hover:bg-[var(--hover-tertiary)]/50 group-focus:bg-[var(--focus-tertiary)]/50 group-active:bg-[var(--active-tertiary)]/50 flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960"
                                    width="26px" class="fill-[var(--surface-variant)]">
                                    <path
                                        d="M287.13-74.02q-55.27 0-94.19-38.92-38.92-38.92-38.92-94.19v-545.74q0-55.37 38.92-94.36t94.19-38.99h519.09v612.2q-24.93 0-40.91 20.09-15.98 20.09-15.98 46.79 0 26.69 15.98 46.68 15.98 19.98 40.91 19.98v66.46H287.13Zm-66.65-247.89q14.23-9.1 30.89-13.83 16.66-4.74 35.76-4.74h33.35v-479.28h-33.35q-28.09 0-47.37 19.4-19.28 19.4-19.28 47.49v430.96Zm166.45-18.57h352.83v-479.28H386.93v479.28Zm-166.45 18.57v-497.85 497.85Zm66.19 181.43h414q-8.44-14.22-13.12-31.41-4.68-17.2-4.68-35.21 0-19.07 4.73-35.75 4.74-16.68 14.07-31.17H286.74q-27.46 0-46.86 19.4t-19.4 47.48q0 27.86 19.4 47.26t46.79 19.4Z" />
                                </svg>
                            </div>
                            <span
                                class="text-sm font-medium text-[var(--surface-variant)] transition duration-150 ease-in-out">E-Library</span>
                        </a>
                        <!-- <a href="" class="flex flex-col justify-center items-center gap-3 group">
      <div class="bg-transparent group-hover:bg-[var(--hover-tertiary)]/50 group-focus:bg-[var(--focus-tertiary)]/50 group-active:bg-[var(--active-tertiary)]/50 flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
       <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" class="fill-[var(--surface-variant)]">
        <path d="M732.63-447.37v-65.26H891v65.26H732.63Zm55.74 292.87-127.7-95.02 39.35-52.31 127.46 94.79-39.11 52.54Zm-85.35-504.67-39.35-52.31 124.7-94.02 39.11 52.3-124.46 94.03ZM199-194.02v-160h-64.5q-27.38-.96-46.44-20.87T69-422.15v-115.7q0-28.2 20.08-48.28 20.09-20.09 48.29-20.09H313.3l207.9-124.54v501.52L313.3-354.02h-44.97v160H199Zm253.83-155.57v-260.82l-121.85 72.56H137.37v115.7h193.61l121.85 72.56Zm108.37 9.57v-280.2q29.63 24.72 47.56 61.01 17.94 36.3 17.94 79.21t-17.89 79.18q-17.89 36.27-47.61 60.8ZM295.22-480Z"/>
       </svg>
      </div>
      <span class="text-sm font-medium text-[var(--surface-variant)] transition duration-150 ease-in-out">E-Lapor</span>
      </a> -->
                        <a href="" class="flex flex-col justify-center items-center gap-3 group">
                            <div
                                class="bg-transparent group-hover:bg-[var(--hover-tertiary)]/50 group-focus:bg-[var(--focus-tertiary)]/50 group-active:bg-[var(--active-tertiary)]/50 flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960"
                                    width="26px" class="fill-[var(--surface-variant)]">
                                    <path
                                        d="M285.2-277h60v-275h-60v275Zm164.8 0h60v-406h-60v406Zm165.04 0h60v-148h-60v148ZM182.15-114.02q-27.6 0-47.86-20.27-20.27-20.26-20.27-47.86v-595.7q0-27.7 20.27-48.03 20.26-20.34 47.86-20.34h595.7q27.7 0 48.03 20.34 20.34 20.33 20.34 48.03v595.7q0 27.6-20.34 47.86-20.33 20.27-48.03 20.27h-595.7Zm0-68.13h595.7v-595.7h-595.7v595.7Zm0-595.7v595.7-595.7Z" />
                                </svg>
                            </div>
                            <span
                                class="text-sm font-medium text-[var(--surface-variant)] transition duration-150 ease-in-out">Statistik</span>
                        </a>
                    </div>
                    <a href=""
                        class="flex flex-col justify-center items-center gap-3 bg-transparent hover:bg-[var(--hover-tertiary)]/50 focus:bg-[var(--focus-tertiary)]/50 active:bg-[var(--active-tertiary)]/50 p-4 rounded-full transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                            class="fill-[var(--surface-variant)]">
                            <path
                                d="M479.95-484.11q-68.68 0-112.3-43.62-43.63-43.63-43.63-112.31t43.63-112.35q43.62-43.68 112.3-43.68t112.47 43.68q43.8 43.67 43.8 112.35 0 68.68-43.8 112.31-43.79 43.62-112.47 43.62Zm-325.93 333.2v-100.41q0-39.56 19.92-68.04 19.91-28.49 51.43-43.27 67.48-30.24 129.69-45.36 62.2-15.12 124.88-15.12 63.13 0 124.79 15.62 61.66 15.62 128.82 45.05 32.88 14.6 52.78 43 19.89 28.4 19.89 68.06v100.47h-652.2Zm68.13-68.13h515.7v-31.37q0-15.85-9.5-30.22-9.5-14.38-23.5-21.3-63.05-30.29-115.45-41.55-52.4-11.26-109.52-11.26-56.64 0-110.28 11.26t-115.35 41.51q-14.1 6.93-23.1 21.31-9 14.39-9 30.25v31.37Zm257.8-333.2q38.09 0 63-24.86 24.9-24.87 24.9-62.98 0-38.21-24.86-63.03-24.85-24.82-62.94-24.82-38.09 0-63 24.83-24.9 24.84-24.9 62.9 0 38.17 24.86 63.06 24.85 24.9 62.94 24.9Zm.05-87.85Zm0 421.05Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="relative w-full max-h-dvh overflow-y-auto z-0" id="main-container">
                <!-- Navbar -->
                <nav id="navbar"
                    class="block 2xl:hidden sticky top-0 px-4 2xl:px-40 py-4 2xl:py-6 transition duration-150 ease-in-out rounded-b-xl 2xl:rounded-b-2xl bg-white">
                    <a href="index.html" class="flex justify-start items-center gap-2 text-[var(--primary)]">
                        <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                            class="fill-[var(--primary)]">
                            <path
                                d="m283.8-445.93 244.18 244.17L480-154.02 154.02-480 480-806.22l47.98 47.98L283.8-514.07h522.42v68.14H283.8Z" />
                        </svg>
                        <span>Kembali</span>
                    </a>
                </nav>
                <main class="px-4 2xl:px-40 py-4 2xl:py-6 flex flex-col gap-4 2xl:gap-6 min-h-full">
                    <div class="flex flex-col justify-center items-center gap-4 2xl:gap-6 w-full">
                        <div class="flex gap-4 2xl:gap-6 w-full 2xl:w-xl justify-center items-center">
                            <div
                                class="w-25 2xl:w-30 h-25 2xl:h-30 aspect-1/1 p-4 bg-[var(--primary-container)] rounded-full flex justify-center items-center flex justify-center items-center">
                                <span
                                    class="text-[var(--primary)] text-5xl font-medium flex justify-center items-center">
                                    @php
                                        $firstChar = Auth::user()->name;
                                        echo $firstChar[0];
                                    @endphp
                                </span>
                            </div>
                            <div class="flex flex-col gap-4 w-full 2xl:w-lg">
                                <div class="relative group w-full">
                                    <input type="text" id="username" name="username" placeholder=" "
                                        value="{{ Auth::user()->username }}"
                                        class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
								focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                        required readonly />
                                    <label for="username"
                                        class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
								group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
								group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                        NPM/NIDN/NIP
                                    </label>
                                </div>
                                <div class="relative group w-full">
                                    <input type="text" id="name" name="name" placeholder=" "
                                        value="{{ Auth::user()->name }}"
                                        class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
								focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                        required readonly />
                                    <label for="name"
                                        class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
								group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
								group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                        Nama Lengkap
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr class="w-full 2xl:w-lg border-gray-400">
                        <form action="" method="post"
                            class="flex flex-col gap-4 2xl:gap-6 justify-center items-center w-full 2xl:w-xl">
                            <div class="relative group w-full">
                                <input type="password" id="current_password" name="current_password" placeholder=" "
                                    value=""
                                    class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                            focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                    required data-password />
                                <label for="current_password"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                            group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                            group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                    Kata Sandi Saat Ini
                                </label>
                            </div>
                            <div class="grid grid-cols-1 2xl:grid-cols-2 gap-4 2xl:gap-6 w-full">
                                <div class="relative group w-full">
                                    <input type="password" id="password" name="password" placeholder=" "
                                        value=""
                                        class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                        required data-password />
                                    <label for="password"
                                        class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                                group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                        Kata Sandi Baru
                                    </label>
                                </div>
                                <div class="relative group w-full">
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        placeholder=" " value=""
                                        class="block w-full border border-gray-400 rounded-md p-3.5 text-sm bg-transparent
                                focus:border-[var(--primary)] focus:ring-0 outline-none transition-all duration-200"
                                        required data-password />
                                    <label for="password_confirmation"
                                        class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 text-sm bg-white px-1.5 transition-all duration-200 cursor-text
                                group-focus-within:top-0 group-focus-within:text-xs group-focus-within:text-[var(--primary)]
                                group-has-[input:not(:placeholder-shown)]:top-0 group-has-[input:not(:placeholder-shown)]:text-xs group-focus-within:cursor-default">
                                        Ulangi Kata Sandi Baru
                                    </label>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 2xl:gap-6 w-full">
                                <x-show-password />
                                <div class="flex justify-end items-center">
                                    <button type="submit"
                                        class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] text-white flex justify-center items-center px-6 py-3 rounded-full cursor-pointer transition duration-150 ease-in-out">
                                        <span class="text-base">Ubah Kata Sandi</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr class="w-full 2xl:w-lg border-gray-400">
                        <form method="POST" action="{{ route('logout') }}"
                            class="w-full 2xl:w-xl flex justify-center items-center">
                            @csrf
                            <button type="submit"
                                class="bg-[var(--error)] hover:bg-[var(--hover-error)] focus:bg-[var(--focus-error)] active:bg-[var(--active-error)] text-white flex justify-center items-center px-6 py-3 rounded-full cursor-pointer w-full transition duration-150 ease-in-out">
                                <span class="text-base">Keluar dari Akun</span>
                            </button>
                        </form>
                    </div>
                </main>
                <!-- <a href="scan.html" class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] p-4 flex justify-center items-center gap-4 rounded-2xl w-full transition duration-150 ease-in-out">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-white"><path d="M79.02-701.87v-179.35h179.11v65.87H144.65v113.48H79.02Zm0 622.85v-179.11h65.63v113.48h113.48v65.63H79.02Zm622.85 0v-65.63h113.48v-113.48h65.87v179.11H701.87Zm113.48-622.85v-113.48H701.87v-65.87h179.35v179.35h-65.87ZM705-254h61.5v61.5H705V-254Zm0-123h61.5v61.5H705V-377Zm-61.5 61.5H705v61.5h-61.5v-61.5ZM582-254h61.5v61.5H582V-254Zm-61.5-61.5H582v61.5h-61.5v-61.5Zm123-123H705v61.5h-61.5v-61.5ZM582-377h61.5v61.5H582V-377Zm-61.5-61.5H582v61.5h-61.5v-61.5Zm246-329v246h-246v-246h246Zm-328 329v246h-246v-246h246Zm0-329v246h-246v-246h246Zm-50.63 523.87v-144.24H243.63v144.24h144.24Zm0-328.5v-144.24H243.63v144.24h144.24Zm327.5 0v-144.24H571.13v144.24h144.24Z"/></svg>
   <span class="text-lg 2xl:text-xl font-medium text-white">Scan QR Absensi</span>
   </a> -->
                <!--
   <h3 class="text-4xl 2xl:text-4xl font-medium">Rekomendasi</h3>
   -->
</body>

</html>
