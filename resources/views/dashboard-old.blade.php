<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyGunadarma</title>
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
    </style>
</head>

<body>
    <div id="app" class="bg-white min-h-dvh max-h-dvh flex flex-col text-[var(--surface-variant)]"
        x-data="{ showModalAbout: false }">
        <div class="flex min-h-dvh max-h-dvh">
            <div class="w-25 hidden 2xl:flex flex-col px-4 py-6">
                <!-- SideBar (Only for Desktop) -->

            </div>
            <div class="relative w-full max-h-dvh overflow-y-auto z-0" id="main-container">
                <div id="banner" class="absolute inset-0 -z-10">
                    <img src="./img/bg-login.png" alt="Banner Gunadarma"
                        class="aspect-3/2 object-cover object-top h-50 2xl:h-100 w-full">
                </div>
                <!-- Navbar -->
                <nav id="navbar"
                    class="sticky top-0 px-4 2xl:px-40 py-4 2xl:py-6 transition duration-150 ease-in-out rounded-b-xl 2xl:rounded-b-2xl">
                    <div class="flex justify-between items-center">
                        <!-- Logo (for Desktop) -->
                        <img src="./img/logo.svg" alt="Logo" id="logo" class="hidden 2xl:block h-12">
                        <!-- Logo (for Mobile) -->
                        <img src="./img/logo_icon.svg" alt="Logo" class="block 2xl:hidden h-12">
                        <button type="button" @click="showModalAbout = true"
                            class="flex flex-col justify-center items-center gap-3 bg-transparent hover:bg-[var(--tertiary)]/50 focus:bg-[var(--tertiary)]/50 active:bg-[var(--tertiary-container)]/50 p-4 rounded-full cursor-pointer transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960"
                                width="26px" class="fill-[var(--surface-variant)]">
                                <path
                                    d="M450.37-277.37h65.26V-520h-65.26v242.63ZM480-590.41q15.55 0 26.07-10.23 10.52-10.24 10.52-25.36 0-16.24-10.52-26.92-10.51-10.67-26.05-10.67-15.81 0-26.21 10.67-10.4 10.68-10.4 26.8 0 15.27 10.52 25.49 10.52 10.22 26.07 10.22Zm.3 516.39q-84.2 0-158.04-31.88-73.84-31.88-129.16-87.2-55.32-55.32-87.2-129.2-31.88-73.88-31.88-158.17 0-84.28 31.88-158.2 31.88-73.91 87.16-128.74 55.28-54.84 129.18-86.82 73.9-31.99 158.21-31.99 84.3 0 158.25 31.97 73.94 31.97 128.75 86.77 54.82 54.8 86.79 128.88 31.98 74.08 31.98 158.33 0 84.24-31.99 158.07-31.98 73.84-86.82 128.95-54.83 55.1-128.87 87.17Q564.5-74.02 480.3-74.02Zm.2-68.13q140.54 0 238.95-98.75 98.4-98.76 98.4-239.6 0-140.54-98.22-238.95-98.21-98.4-239.75-98.4-140.16 0-238.95 98.22-98.78 98.21-98.78 239.75 0 140.16 98.75 238.95 98.76 98.78 239.6 98.78ZM480-480Z" />
                            </svg>
                        </button>
                    </div>
                </nav>
                <main class="px-4 2xl:px-40 py-4 2xl:py-6 flex flex-col gap-4 2xl:gap-6 min-h-full pt-35 2xl:pt-80">
                    <div class="flex flex-col justify-center items-start gap-4 w-full">
                        <div class="flex flex-col justify-center items-start gap-2">
                            <h3 class="text-xl 2xl:text-2xl font-bold">Menu Absensi</h3>
                            <p class="text-[var(--surface-variant)]">Akses dan kelola absensi langsung dari sini</p>
                        </div>
                        <a href="/presences/scan"
                            class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] p-4 flex justify-center items-center gap-4 rounded-2xl w-full transition duration-150 ease-in-out">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-white">
                                <path
                                    d="M79.02-701.87v-179.35h179.11v65.87H144.65v113.48H79.02Zm0 622.85v-179.11h65.63v113.48h113.48v65.63H79.02Zm622.85 0v-65.63h113.48v-113.48h65.87v179.11H701.87Zm113.48-622.85v-113.48H701.87v-65.87h179.35v179.35h-65.87ZM705-254h61.5v61.5H705V-254Zm0-123h61.5v61.5H705V-377Zm-61.5 61.5H705v61.5h-61.5v-61.5ZM582-254h61.5v61.5H582V-254Zm-61.5-61.5H582v61.5h-61.5v-61.5Zm123-123H705v61.5h-61.5v-61.5ZM582-377h61.5v61.5H582V-377Zm-61.5-61.5H582v61.5h-61.5v-61.5Zm246-329v246h-246v-246h246Zm-328 329v246h-246v-246h246Zm0-329v246h-246v-246h246Zm-50.63 523.87v-144.24H243.63v144.24h144.24Zm0-328.5v-144.24H243.63v144.24h144.24Zm327.5 0v-144.24H571.13v144.24h144.24Z" />
                            </svg>
                            <span class="text-lg 2xl:text-xl font-medium text-white">Scan QR Absensi</span>
                        </a>
                    </div>
                    <div class="flex flex-col justify-center items-start gap-4 w-full">
                        <div class="flex flex-col justify-center items-start gap-2">
                            <h3 class="text-xl 2xl:text-2xl font-bold">Menu Lainnya</h3>
                            <p class="text-[var(--surface-variant)]">Temukan berbagai fitur menarik di My Gunadarma</p>
                        </div>
                        <div class="grid grid-cols-2 2xl:grid-cols-2 gap-4 w-full">
                            <a href=""
                                class="bg-[var(--secondary)] hover:bg-[var(--hover-secondary)] focus:bg-[var(--focus-secondary)] active:bg-[var(--active-secondary)] p-4 flex flex-col justify-center items-center gap-4 rounded-2xl transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                    class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-[var(--surface-variant)]">
                                    <path
                                        d="M640.48-114.02q-34.52 0-58.93-24.35-24.42-24.34-24.42-58.76v-159.76q0-34.2 24.42-58.65Q605.96-440 640.48-440H800q34.52 0 58.93 24.46 24.42 24.45 24.42 58.65v159.76q0 34.42-24.42 58.76-24.41 24.35-58.93 24.35H640.48Zm-14.98-68.13h189.48v-189.72H625.5v189.72ZM74.02-242.83v-68.37h362.87v68.37H74.02ZM640.48-520q-34.52 0-58.93-24.41-24.42-24.42-24.42-58.94v-159.52q0-34.52 24.42-58.93 24.41-24.42 58.93-24.42H800q34.52 0 58.93 24.42 24.42 24.41 24.42 58.93v159.52q0 34.52-24.42 58.94Q834.52-520 800-520H640.48Zm-14.98-68.37h189.48v-189.48H625.5v189.48ZM74.02-649.04v-68.13h362.87v68.13H74.02Zm646.22 372.15Zm0-406.22Z" />
                                </svg>
                                <span class="text-lg 2xl:text-xl font-medium">To-Do List</span>
                            </a>
                            <a href=""
                                class="bg-[var(--secondary)] hover:bg-[var(--hover-secondary)] focus:bg-[var(--focus-secondary)] active:bg-[var(--active-secondary)] p-4 flex flex-col justify-center items-center gap-4 rounded-2xl transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                                    class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-[var(--surface-variant)]">
                                    <path
                                        d="M287.13-74.02q-55.27 0-94.19-38.92-38.92-38.92-38.92-94.19v-545.74q0-55.37 38.92-94.36t94.19-38.99h519.09v612.2q-24.93 0-40.91 20.09-15.98 20.09-15.98 46.79 0 26.69 15.98 46.68 15.98 19.98 40.91 19.98v66.46H287.13Zm-66.65-247.89q14.23-9.1 30.89-13.83 16.66-4.74 35.76-4.74h33.35v-479.28h-33.35q-28.09 0-47.37 19.4-19.28 19.4-19.28 47.49v430.96Zm166.45-18.57h352.83v-479.28H386.93v479.28Zm-166.45 18.57v-497.85 497.85Zm66.19 181.43h414q-8.44-14.22-13.12-31.41-4.68-17.2-4.68-35.21 0-19.07 4.73-35.75 4.74-16.68 14.07-31.17H286.74q-27.46 0-46.86 19.4t-19.4 47.48q0 27.86 19.4 47.26t46.79 19.4Z" />
                                </svg>
                                <span class="text-lg 2xl:text-xl font-medium">E-Library</span>
                            </a>
                        </div>
                    </div>
                </main>
                <!-- Navigation Footer (Only for Mobile) -->
                <footer
                    class="sticky bottom-0 bg-[var(--surface-container)] flex 2xl:hidden flex-col p-2 items-center justify-center">
                    <div class="grid grid-cols-3 gap-2 w-full">
                        <a href=""
                            class="flex flex-col justify-center items-center gap-2 group text-[var(--primary)]">
                            <div
                                class="bg-[var(--primary-container)] group-hover:bg-[var(--primary-container)] group-focus:bg-[var(--primary-container)] group-active:bg-[var(--primary-container)] flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960"
                                    width="26px" class="fill-[var(--primary)]">
                                    <path
                                        d="M145.87-105.87v-501.29L480-858.09l334.7 250.74v501.48H563.39v-297.52H396.61v297.52H145.87Z" />
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold text-[var(--primary)] transition duration-150 ease-in-out">Beranda</span>
                        </a>
                        <a href="/presences/scan" class="flex flex-col justify-center items-center gap-2 group">
                            <div
                                class="bg-transparent group-hover:bg-[var(--hover-tertiary)]/50 group-focus:bg-[var(--focus-tertiary)]/50 group-active:bg-[var(--active-tertiary)]/50 flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960"
                                    width="26px" class="fill-[var(--surface-variant)]">
                                    <path
                                        d="M74.02-704.37v-181.85h181.61v68.37H142.15v113.48H74.02Zm0 630.35v-181.61h68.13v113.48h113.48v68.13H74.02Zm630.35 0v-68.13h113.48v-113.48h68.37v181.61H704.37Zm113.48-630.35v-113.48H704.37v-68.37h181.85v181.85h-68.37ZM708-251h63v63h-63v-63Zm0-126h63v63h-63v-63Zm-63 63h63v63h-63v-63Zm-63 63h63v63h-63v-63Zm-63-63h63v63h-63v-63Zm126-126h63v63h-63v-63Zm-63 63h63v63h-63v-63Zm-63-63h63v63h-63v-63Zm252-332v252H519v-252h252ZM440-440v252H188v-252h252Zm0-332v252H188v-252h252Zm-52.63 531.37v-146.74H240.63v146.74h146.74Zm0-332v-146.74H240.63v146.74h146.74Zm331 0v-146.74H571.63v146.74h146.74Z" />
                                </svg>
                            </div>
                            <span
                                class="text-xs font-medium text-[var(--surface-variant)] transition duration-150 ease-in-out">Absensi</span>
                        </a>
                        <a href="/profile" class="flex flex-col justify-center items-center gap-2 group">
                            <div
                                class="bg-transparent group-hover:bg-[var(--hover-tertiary)]/50 group-focus:bg-[var(--focus-tertiary)]/50 group-active:bg-[var(--active-tertiary)]/50 flex justify-center items-center w-full p-1 rounded-full transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960"
                                    width="26px" class="fill-[var(--surface-variant)]">
                                    <path
                                        d="M479.95-484.11q-68.68 0-112.3-43.62-43.63-43.63-43.63-112.31t43.63-112.35q43.62-43.68 112.3-43.68t112.47 43.68q43.8 43.67 43.8 112.35 0 68.68-43.8 112.31-43.79 43.62-112.47 43.62Zm-325.93 333.2v-100.41q0-39.56 19.92-68.04 19.91-28.49 51.43-43.27 67.48-30.24 129.69-45.36 62.2-15.12 124.88-15.12 63.13 0 124.79 15.62 61.66 15.62 128.82 45.05 32.88 14.6 52.78 43 19.89 28.4 19.89 68.06v100.47h-652.2Zm68.13-68.13h515.7v-31.37q0-15.85-9.5-30.22-9.5-14.38-23.5-21.3-63.05-30.29-115.45-41.55-52.4-11.26-109.52-11.26-56.64 0-110.28 11.26t-115.35 41.51q-14.1 6.93-23.1 21.31-9 14.39-9 30.25v31.37Zm257.8-333.2q38.09 0 63-24.86 24.9-24.87 24.9-62.98 0-38.21-24.86-63.03-24.85-24.82-62.94-24.82-38.09 0-63 24.83-24.9 24.84-24.9 62.9 0 38.17 24.86 63.06 24.85 24.9 62.94 24.9Zm.05-87.85Zm0 421.05Z" />
                                </svg>
                            </div>
                            <span
                                class="text-xs font-medium text-[var(--surface-variant)] transition duration-150 ease-in-out">Profil</span>
                        </a>
                    </div>
                </footer>
            </div>
        </div>
        <div x-show="showModalAbout" @click.self="showModalAbout = false" x-transition.opacity
            class="fixed p-4 min-h-dvh max-h-dvh min-w-dvw max-w-dvw z-100 flex justify-center items-center bg-black/50"
            x-cloak>
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
                            <li><span class="bg-black p-1 text-white font-medium rounded">[UI/UX Designer]</span> DESKA
                                BINTANG EKA HARPUTRA (10125244)</li>
                            <li><span class="bg-orange-500 p-1 text-white font-medium rounded">[Frontend
                                    Developer]</span> MUHAMMAD ZIDANE FEBRIAN (10125749)</li>
                            <li><span class="bg-orange-500 p-1 text-white font-medium rounded">[Frontend
                                    Developer]</span> NADIA PUTRI SALSABILA (10125766)</li>
                            <li><span class="bg-black p-1 text-white font-medium rounded">[UI/UX Designer]</span>
                                OKTASYAH BINTANG RAMADHAN (10125834)</li>
                            <li><span class="bg-red-500 p-1 text-white font-medium rounded">[Backend Engineer]</span>
                                RAFIE RESTU RAMADHANI (10125885)</li>
                            <li><span class="bg-orange-500 p-1 text-white font-medium rounded">[Frontend
                                    Developer]</span> RAFLI (10125887)</li>
                            <li><span class="bg-black p-1 text-white font-medium rounded">[UI/UX Designer]</span>
                                RANGGA PASYA YUANZA (10125908)</li>
                            <li><span class="bg-red-500 p-1 text-white font-medium rounded">[Backend Engineer]</span>
                                REISYA AHMAD PRIYATAMA (10125939)</li>
                            <li><span class="bg-red-500 p-1 text-white font-medium rounded">[Backend Engineer]</span>
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
    </div>
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
</body>

</html>
