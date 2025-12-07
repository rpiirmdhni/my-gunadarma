@section('title', 'Dasbor')
<x-app-layout>
    @if (Auth::user()->role == 3 || Auth::user()->role == 2)
        <div class="flex flex-col justify-center items-start gap-4 w-full">
            <div class="flex flex-col justify-center items-start gap-2">
                <h3 class="text-xl 2xl:text-2xl font-bold">Menu Absensi</h3>
                <p class="text-[var(--surface-variant)]">Akses dan kelola absensi langsung dari sini</p>
            </div>
            @if (Auth::user()->role == 3)
                <a href="{{ route('attendances.scanner') }}" @click="splash = true"
                    class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] p-4 flex justify-center items-center gap-4 rounded-2xl w-full transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-white">
                        <path
                            d="M79.02-701.87v-179.35h179.11v65.87H144.65v113.48H79.02Zm0 622.85v-179.11h65.63v113.48h113.48v65.63H79.02Zm622.85 0v-65.63h113.48v-113.48h65.87v179.11H701.87Zm113.48-622.85v-113.48H701.87v-65.87h179.35v179.35h-65.87ZM705-254h61.5v61.5H705V-254Zm0-123h61.5v61.5H705V-377Zm-61.5 61.5H705v61.5h-61.5v-61.5ZM582-254h61.5v61.5H582V-254Zm-61.5-61.5H582v61.5h-61.5v-61.5Zm123-123H705v61.5h-61.5v-61.5ZM582-377h61.5v61.5H582V-377Zm-61.5-61.5H582v61.5h-61.5v-61.5Zm246-329v246h-246v-246h246Zm-328 329v246h-246v-246h246Zm0-329v246h-246v-246h246Zm-50.63 523.87v-144.24H243.63v144.24h144.24Zm0-328.5v-144.24H243.63v144.24h144.24Zm327.5 0v-144.24H571.13v144.24h144.24Z" />
                    </svg>
                    <span class="text-lg 2xl:text-xl font-medium text-white">Scan QR Absensi</span>
                </a>
            @elseif (Auth::user()->role == 2)
                <a href="{{ route('attendances.manage') }}" @click="splash = true"
                    class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] p-4 flex justify-center items-center gap-4 rounded-2xl w-full transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-white">
                        <path
                            d="M79.02-701.87v-179.35h179.11v65.87H144.65v113.48H79.02Zm0 622.85v-179.11h65.63v113.48h113.48v65.63H79.02Zm622.85 0v-65.63h113.48v-113.48h65.87v179.11H701.87Zm113.48-622.85v-113.48H701.87v-65.87h179.35v179.35h-65.87ZM705-254h61.5v61.5H705V-254Zm0-123h61.5v61.5H705V-377Zm-61.5 61.5H705v61.5h-61.5v-61.5ZM582-254h61.5v61.5H582V-254Zm-61.5-61.5H582v61.5h-61.5v-61.5Zm123-123H705v61.5h-61.5v-61.5ZM582-377h61.5v61.5H582V-377Zm-61.5-61.5H582v61.5h-61.5v-61.5Zm246-329v246h-246v-246h246Zm-328 329v246h-246v-246h246Zm0-329v246h-246v-246h246Zm-50.63 523.87v-144.24H243.63v144.24h144.24Zm0-328.5v-144.24H243.63v144.24h144.24Zm327.5 0v-144.24H571.13v144.24h144.24Z" />
                    </svg>
                    <span class="text-lg 2xl:text-xl font-medium text-white">Kelola QR Absensi</span>
                </a>
            @endif
        </div>
    @endif
    @if (Auth::user()->role == 0)
        <div class="flex flex-col justify-center items-start gap-4 w-full">
            <div class="flex flex-col justify-center items-start gap-2">
                <h3 class="text-xl 2xl:text-2xl font-bold">Menu Admin</h3>
                <p class="text-[var(--surface-variant)]">Akses dan kelola data MyGunadarma langsung dari sini</p>
            </div>
            <div class="grid grid-cols-2 2xl:grid-cols-4 gap-4 w-full">
                <a href="{{ route('admin.manage.courses') }}" @click="splash = true"
                    class="bg-[var(--secondary)] hover:bg-[var(--hover-secondary)] focus:bg-[var(--focus-secondary)] active:bg-[var(--active-secondary)] p-4 flex flex-col justify-center items-center gap-4 rounded-2xl transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-[var(--surface-variant)]">
                        <path
                            d="M189.06-437h253.06v-172.03H189.06V-437Zm0-247.78h581.88v-86.16H189.06v86.16Zm0 571.48q-31 0-53.38-22.38-22.38-22.38-22.38-53.38v-581.88q0-31.06 22.38-53.49 22.38-22.43 53.38-22.43h581.88q31.06 0 53.49 22.43 22.43 22.43 22.43 53.49v267.05q-17.98-8.72-37.17-12.02-19.18-3.3-38.75-1-22.59 2.56-44.14 11.69-21.54 9.12-39.33 27.06L646.55-437 442.12-233.82v120.52H189.06Zm0-75.76h253.06v-172.03H189.06v172.03ZM517.88-437h128.67l40.92-41.16q17.79-17.94 39.33-27.06 21.55-9.13 44.14-11.69v-92.12H517.88V-437Zm1 363.7v-128.58L741-423q9.58-9.68 21.29-13.98 11.7-4.3 23.58-4.3 12.64 0 24.41 4.86 11.76 4.86 21.3 14.42l37 37q9.18 9.56 13.73 21.28 4.55 11.71 4.55 23.43 0 12.04-4.7 24.17-4.69 12.14-14.19 21.7L647.46-73.3H518.88Zm303.99-266.99-37-37 37 37Zm-240 203h38l120.2-121.17-37-37.03-121.2 120.16v38.04Zm140.2-140.2-19-18 37 37-18-19Z" />
                    </svg>
                    <span class="text-lg 2xl:text-xl font-medium text-center truncate">Kelola Mata Kuliah</span>
                </a>
                <a href="{{ route('admin.manage.courseschedule') }}" @click="splash = true"
                    class="bg-[var(--secondary)] hover:bg-[var(--hover-secondary)] focus:bg-[var(--focus-secondary)] active:bg-[var(--active-secondary)] p-4 flex flex-col justify-center items-center gap-4 rounded-2xl transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-[var(--surface-variant)]">
                        <path
                            d="M189.06-437h253.06v-172.03H189.06V-437Zm0-247.78h581.88v-86.16H189.06v86.16Zm0 571.48q-31 0-53.38-22.38-22.38-22.38-22.38-53.38v-581.88q0-31.06 22.38-53.49 22.38-22.43 53.38-22.43h581.88q31.06 0 53.49 22.43 22.43 22.43 22.43 53.49v267.05q-17.98-8.72-37.17-12.02-19.18-3.3-38.75-1-22.59 2.56-44.14 11.69-21.54 9.12-39.33 27.06L646.55-437 442.12-233.82v120.52H189.06Zm0-75.76h253.06v-172.03H189.06v172.03ZM517.88-437h128.67l40.92-41.16q17.79-17.94 39.33-27.06 21.55-9.13 44.14-11.69v-92.12H517.88V-437Zm1 363.7v-128.58L741-423q9.58-9.68 21.29-13.98 11.7-4.3 23.58-4.3 12.64 0 24.41 4.86 11.76 4.86 21.3 14.42l37 37q9.18 9.56 13.73 21.28 4.55 11.71 4.55 23.43 0 12.04-4.7 24.17-4.69 12.14-14.19 21.7L647.46-73.3H518.88Zm303.99-266.99-37-37 37 37Zm-240 203h38l120.2-121.17-37-37.03-121.2 120.16v38.04Zm140.2-140.2-19-18 37 37-18-19Z" />
                    </svg>
                    <span class="text-lg 2xl:text-xl font-medium text-center truncate">Kelola Jadwal</span>
                </a>
                <a href="{{ route('admin.manage.majors') }}" @click="splash = true"
                    class="bg-[var(--secondary)] hover:bg-[var(--hover-secondary)] focus:bg-[var(--focus-secondary)] active:bg-[var(--active-secondary)] p-4 flex flex-col justify-center items-center gap-4 rounded-2xl transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-[var(--surface-variant)]">
                        <path
                            d="M189.06-437h253.06v-172.03H189.06V-437Zm0-247.78h581.88v-86.16H189.06v86.16Zm0 571.48q-31 0-53.38-22.38-22.38-22.38-22.38-53.38v-581.88q0-31.06 22.38-53.49 22.38-22.43 53.38-22.43h581.88q31.06 0 53.49 22.43 22.43 22.43 22.43 53.49v267.05q-17.98-8.72-37.17-12.02-19.18-3.3-38.75-1-22.59 2.56-44.14 11.69-21.54 9.12-39.33 27.06L646.55-437 442.12-233.82v120.52H189.06Zm0-75.76h253.06v-172.03H189.06v172.03ZM517.88-437h128.67l40.92-41.16q17.79-17.94 39.33-27.06 21.55-9.13 44.14-11.69v-92.12H517.88V-437Zm1 363.7v-128.58L741-423q9.58-9.68 21.29-13.98 11.7-4.3 23.58-4.3 12.64 0 24.41 4.86 11.76 4.86 21.3 14.42l37 37q9.18 9.56 13.73 21.28 4.55 11.71 4.55 23.43 0 12.04-4.7 24.17-4.69 12.14-14.19 21.7L647.46-73.3H518.88Zm303.99-266.99-37-37 37 37Zm-240 203h38l120.2-121.17-37-37.03-121.2 120.16v38.04Zm140.2-140.2-19-18 37 37-18-19Z" />
                    </svg>
                    <span class="text-lg 2xl:text-xl font-medium text-center truncate">Kelola Jurusan</span>
                </a>
                <a href="{{ route('admin.manage.classrooms') }}" @click="splash = true"
                    class="bg-[var(--secondary)] hover:bg-[var(--hover-secondary)] focus:bg-[var(--focus-secondary)] active:bg-[var(--active-secondary)] p-4 flex flex-col justify-center items-center gap-4 rounded-2xl transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-[var(--surface-variant)]">
                        <path
                            d="M189.06-437h253.06v-172.03H189.06V-437Zm0-247.78h581.88v-86.16H189.06v86.16Zm0 571.48q-31 0-53.38-22.38-22.38-22.38-22.38-53.38v-581.88q0-31.06 22.38-53.49 22.38-22.43 53.38-22.43h581.88q31.06 0 53.49 22.43 22.43 22.43 22.43 53.49v267.05q-17.98-8.72-37.17-12.02-19.18-3.3-38.75-1-22.59 2.56-44.14 11.69-21.54 9.12-39.33 27.06L646.55-437 442.12-233.82v120.52H189.06Zm0-75.76h253.06v-172.03H189.06v172.03ZM517.88-437h128.67l40.92-41.16q17.79-17.94 39.33-27.06 21.55-9.13 44.14-11.69v-92.12H517.88V-437Zm1 363.7v-128.58L741-423q9.58-9.68 21.29-13.98 11.7-4.3 23.58-4.3 12.64 0 24.41 4.86 11.76 4.86 21.3 14.42l37 37q9.18 9.56 13.73 21.28 4.55 11.71 4.55 23.43 0 12.04-4.7 24.17-4.69 12.14-14.19 21.7L647.46-73.3H518.88Zm303.99-266.99-37-37 37 37Zm-240 203h38l120.2-121.17-37-37.03-121.2 120.16v38.04Zm140.2-140.2-19-18 37 37-18-19Z" />
                    </svg>
                    <span class="text-lg 2xl:text-xl font-medium text-center truncate">Kelola Kelas</span>
                </a>
                <a href="{{ route('admin.manage.students') }}" @click="splash = true"
                    class="bg-[var(--secondary)] hover:bg-[var(--hover-secondary)] focus:bg-[var(--focus-secondary)] active:bg-[var(--active-secondary)] p-4 flex flex-col justify-center items-center gap-4 rounded-2xl transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-[var(--surface-variant)]">
                        <path
                            d="M492.22-225.63ZM153.3-149.88v-107.14q0-38.44 19.53-67.56 19.52-29.11 50.89-44.29 65.89-30.57 129.01-45.9 63.12-15.32 127.27-15.32 38.56 0 75.91 5.61 37.35 5.61 75.37 16.53l-62.38 61.97q-22.61-4.16-44.26-6.18-21.65-2.02-44.64-2.02-56.35 0-110.36 11.93-54.02 11.92-112.51 40.77-12.41 6.25-20.24 18.78-7.83 12.52-7.83 26.69v30.38h263.16v75.75H153.3Zm405.58 36.58v-128.58L781-463q9.58-9.68 21.29-13.98 11.7-4.3 23.58-4.3 12.64 0 24.41 4.86 11.76 4.86 21.3 14.42l37 37q9.18 9.56 13.73 21.28 4.55 11.71 4.55 23.43 0 12.04-4.7 24.17-4.69 12.14-14.19 21.7L687.46-113.3H558.88Zm303.99-266.99-37-37 37 37Zm-240 203h38l120.2-121.17-18-19.01-19-18.02-121.2 120.16v38.04Zm140.2-140.2-19-18 37 37-18-19ZM480-484.09q-66.79 0-113.41-46.62-46.62-46.62-46.62-113.49t46.62-113.37q46.62-46.5 113.41-46.5 66.79 0 113.49 46.5 46.7 46.5 46.7 113.37t-46.7 113.49q-46.7 46.62-113.49 46.62Zm0-75.76q35.38 0 59.83-24.45 24.45-24.45 24.45-59.78 0-35.34-24.46-59.79-24.45-24.45-59.78-24.45-35.34 0-59.83 24.49-24.49 24.5-24.49 59.63 0 35.45 24.45 59.9 24.45 24.45 59.83 24.45Zm0-84.27Z" />
                    </svg>
                    <span class="text-lg 2xl:text-xl font-medium text-center truncate">Kelola Mahasiswa</span>
                </a>
                <a href="{{ route('admin.manage.lecturers') }}" @click="splash = true"
                    class="bg-[var(--secondary)] hover:bg-[var(--hover-secondary)] focus:bg-[var(--focus-secondary)] active:bg-[var(--active-secondary)] p-4 flex flex-col justify-center items-center gap-4 rounded-2xl transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-[var(--surface-variant)]">
                        <path
                            d="M492.22-225.63ZM153.3-149.88v-107.14q0-38.44 19.53-67.56 19.52-29.11 50.89-44.29 65.89-30.57 129.01-45.9 63.12-15.32 127.27-15.32 38.56 0 75.91 5.61 37.35 5.61 75.37 16.53l-62.38 61.97q-22.61-4.16-44.26-6.18-21.65-2.02-44.64-2.02-56.35 0-110.36 11.93-54.02 11.92-112.51 40.77-12.41 6.25-20.24 18.78-7.83 12.52-7.83 26.69v30.38h263.16v75.75H153.3Zm405.58 36.58v-128.58L781-463q9.58-9.68 21.29-13.98 11.7-4.3 23.58-4.3 12.64 0 24.41 4.86 11.76 4.86 21.3 14.42l37 37q9.18 9.56 13.73 21.28 4.55 11.71 4.55 23.43 0 12.04-4.7 24.17-4.69 12.14-14.19 21.7L687.46-113.3H558.88Zm303.99-266.99-37-37 37 37Zm-240 203h38l120.2-121.17-18-19.01-19-18.02-121.2 120.16v38.04Zm140.2-140.2-19-18 37 37-18-19ZM480-484.09q-66.79 0-113.41-46.62-46.62-46.62-46.62-113.49t46.62-113.37q46.62-46.5 113.41-46.5 66.79 0 113.49 46.5 46.7 46.5 46.7 113.37t-46.7 113.49q-46.7 46.62-113.49 46.62Zm0-75.76q35.38 0 59.83-24.45 24.45-24.45 24.45-59.78 0-35.34-24.46-59.79-24.45-24.45-59.78-24.45-35.34 0-59.83 24.49-24.49 24.5-24.49 59.63 0 35.45 24.45 59.9 24.45 24.45 59.83 24.45Zm0-84.27Z" />
                    </svg>
                    <span class="text-lg 2xl:text-xl font-medium text-center truncate">Kelola Dosen</span>
                </a>
                <a href="{{ route('admin.manage.employees') }}" @click="splash = true"
                    class="bg-[var(--secondary)] hover:bg-[var(--hover-secondary)] focus:bg-[var(--focus-secondary)] active:bg-[var(--active-secondary)] p-4 flex flex-col justify-center items-center gap-4 rounded-2xl transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-[var(--surface-variant)]">
                        <path
                            d="M492.22-225.63ZM153.3-149.88v-107.14q0-38.44 19.53-67.56 19.52-29.11 50.89-44.29 65.89-30.57 129.01-45.9 63.12-15.32 127.27-15.32 38.56 0 75.91 5.61 37.35 5.61 75.37 16.53l-62.38 61.97q-22.61-4.16-44.26-6.18-21.65-2.02-44.64-2.02-56.35 0-110.36 11.93-54.02 11.92-112.51 40.77-12.41 6.25-20.24 18.78-7.83 12.52-7.83 26.69v30.38h263.16v75.75H153.3Zm405.58 36.58v-128.58L781-463q9.58-9.68 21.29-13.98 11.7-4.3 23.58-4.3 12.64 0 24.41 4.86 11.76 4.86 21.3 14.42l37 37q9.18 9.56 13.73 21.28 4.55 11.71 4.55 23.43 0 12.04-4.7 24.17-4.69 12.14-14.19 21.7L687.46-113.3H558.88Zm303.99-266.99-37-37 37 37Zm-240 203h38l120.2-121.17-18-19.01-19-18.02-121.2 120.16v38.04Zm140.2-140.2-19-18 37 37-18-19ZM480-484.09q-66.79 0-113.41-46.62-46.62-46.62-46.62-113.49t46.62-113.37q46.62-46.5 113.41-46.5 66.79 0 113.49 46.5 46.7 46.5 46.7 113.37t-46.7 113.49q-46.7 46.62-113.49 46.62Zm0-75.76q35.38 0 59.83-24.45 24.45-24.45 24.45-59.78 0-35.34-24.46-59.79-24.45-24.45-59.78-24.45-35.34 0-59.83 24.49-24.49 24.5-24.49 59.63 0 35.45 24.45 59.9 24.45 24.45 59.83 24.45Zm0-84.27Z" />
                    </svg>
                    <span class="text-lg 2xl:text-xl font-medium text-center truncate">Kelola Pegawai</span>
                </a>
                <a href="{{ route('admin.manage.users') }}" @click="splash = true"
                    class="bg-[var(--secondary)] hover:bg-[var(--hover-secondary)] focus:bg-[var(--focus-secondary)] active:bg-[var(--active-secondary)] p-4 flex flex-col justify-center items-center gap-4 rounded-2xl transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-[var(--surface-variant)]">
                        <path
                            d="M492.22-225.63ZM153.3-149.88v-107.14q0-38.44 19.53-67.56 19.52-29.11 50.89-44.29 65.89-30.57 129.01-45.9 63.12-15.32 127.27-15.32 38.56 0 75.91 5.61 37.35 5.61 75.37 16.53l-62.38 61.97q-22.61-4.16-44.26-6.18-21.65-2.02-44.64-2.02-56.35 0-110.36 11.93-54.02 11.92-112.51 40.77-12.41 6.25-20.24 18.78-7.83 12.52-7.83 26.69v30.38h263.16v75.75H153.3Zm405.58 36.58v-128.58L781-463q9.58-9.68 21.29-13.98 11.7-4.3 23.58-4.3 12.64 0 24.41 4.86 11.76 4.86 21.3 14.42l37 37q9.18 9.56 13.73 21.28 4.55 11.71 4.55 23.43 0 12.04-4.7 24.17-4.69 12.14-14.19 21.7L687.46-113.3H558.88Zm303.99-266.99-37-37 37 37Zm-240 203h38l120.2-121.17-18-19.01-19-18.02-121.2 120.16v38.04Zm140.2-140.2-19-18 37 37-18-19ZM480-484.09q-66.79 0-113.41-46.62-46.62-46.62-46.62-113.49t46.62-113.37q46.62-46.5 113.41-46.5 66.79 0 113.49 46.5 46.7 46.5 46.7 113.37t-46.7 113.49q-46.7 46.62-113.49 46.62Zm0-75.76q35.38 0 59.83-24.45 24.45-24.45 24.45-59.78 0-35.34-24.46-59.79-24.45-24.45-59.78-24.45-35.34 0-59.83 24.49-24.49 24.5-24.49 59.63 0 35.45 24.45 59.9 24.45 24.45 59.83 24.45Zm0-84.27Z" />
                    </svg>
                    <span class="text-lg 2xl:text-xl font-medium text-center truncate">Kelola Pengguna</span>
                </a>
            </div>
        </div>
    @endif
    <div class="flex flex-col justify-center items-start gap-4 w-full">
        <div class="flex flex-col justify-center items-start gap-2">
            <h3 class="text-xl 2xl:text-2xl font-bold">Menu Lainnya</h3>
            <p class="text-[var(--surface-variant)]">Temukan berbagai fitur menarik di MyGunadarma</p>
        </div>
        <div class="grid grid-cols-2 2xl:grid-cols-2 gap-4 w-full">
            <a href="{{ route('todolist') }}" @click="splash = true"
                class="bg-[var(--secondary)] hover:bg-[var(--hover-secondary)] focus:bg-[var(--focus-secondary)] active:bg-[var(--active-secondary)] p-4 flex flex-col justify-center items-center gap-4 rounded-2xl transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                    class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-[var(--surface-variant)]">
                    <path
                        d="M640.48-114.02q-34.52 0-58.93-24.35-24.42-24.34-24.42-58.76v-159.76q0-34.2 24.42-58.65Q605.96-440 640.48-440H800q34.52 0 58.93 24.46 24.42 24.45 24.42 58.65v159.76q0 34.42-24.42 58.76-24.41 24.35-58.93 24.35H640.48Zm-14.98-68.13h189.48v-189.72H625.5v189.72ZM74.02-242.83v-68.37h362.87v68.37H74.02ZM640.48-520q-34.52 0-58.93-24.41-24.42-24.42-24.42-58.94v-159.52q0-34.52 24.42-58.93 24.41-24.42 58.93-24.42H800q34.52 0 58.93 24.42 24.42 24.41 24.42 58.93v159.52q0 34.52-24.42 58.94Q834.52-520 800-520H640.48Zm-14.98-68.37h189.48v-189.48H625.5v189.48ZM74.02-649.04v-68.13h362.87v68.13H74.02Zm646.22 372.15Zm0-406.22Z" />
                </svg>
                <span class="text-lg 2xl:text-xl font-medium text-center truncate">To-Do List</span>
            </a>
            <a href="{{ route('elib.index') }}" @click="splash = true"
                class="bg-[var(--secondary)] hover:bg-[var(--hover-secondary)] focus:bg-[var(--focus-secondary)] active:bg-[var(--active-secondary)] p-4 flex flex-col justify-center items-center gap-4 rounded-2xl transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                    class="h-[40px] w-[40px] 2xl:h-[50px] 2xl:w-[50px] fill-[var(--surface-variant)]">
                    <path
                        d="M287.13-74.02q-55.27 0-94.19-38.92-38.92-38.92-38.92-94.19v-545.74q0-55.37 38.92-94.36t94.19-38.99h519.09v612.2q-24.93 0-40.91 20.09-15.98 20.09-15.98 46.79 0 26.69 15.98 46.68 15.98 19.98 40.91 19.98v66.46H287.13Zm-66.65-247.89q14.23-9.1 30.89-13.83 16.66-4.74 35.76-4.74h33.35v-479.28h-33.35q-28.09 0-47.37 19.4-19.28 19.4-19.28 47.49v430.96Zm166.45-18.57h352.83v-479.28H386.93v479.28Zm-166.45 18.57v-497.85 497.85Zm66.19 181.43h414q-8.44-14.22-13.12-31.41-4.68-17.2-4.68-35.21 0-19.07 4.73-35.75 4.74-16.68 14.07-31.17H286.74q-27.46 0-46.86 19.4t-19.4 47.48q0 27.86 19.4 47.26t46.79 19.4Z" />
                </svg>
                <span class="text-lg 2xl:text-xl font-medium text-center truncate">E-Library</span>
            </a>
        </div>
    </div>
</x-app-layout>
