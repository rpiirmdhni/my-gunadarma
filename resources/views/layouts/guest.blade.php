<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <div id="app" x-init="setTimeout(() => splash = false, 1500)" x-data="{ splash: true }"
        class="flex flex-col">
        <div
            x-show="splash"
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-white flex flex-col items-center justify-center z-50"
        >
            <img src="/img/logo_icon.svg" alt="Gunadarma" class="h-40 w-40">
        </div>
        <div class="bg-[url(/img/bg-login.png)] bg-no-repeat bg-center bg-cover min-h-dvh max-h-dvh flex flex-col">
            <div class="grid grid-rows-12 2xl:grid-cols-3 min-h-dvh max-h-dvh">
                <div class="@if (Route::is('landingpage')) row-span-9 @else row-span-0 @endif 2xl:row-span-12 2xl:col-span-2 @if (!Route::is('landingpage')) hidden 2xl:flex @endif w-full h-full"></div>
                <div
                    @if (Route::is('landingpage'))
                        class="row-span-3 2xl:row-span-12 2xl:col-span-1 bg-white rounded-t-4xl 2xl:rounded-t-none 2xl:rounded-l-4xl w-full h-full flex justify-center items-center p-4"
                    @else
                        class="row-span-12 bg-white 2xl:rounded-l-4xl 2xl:col-span-1 w-full h-full flex flex-col justify-center items-center p-4"
                    @endif
                    x-show="!splash"
            x-transition.opacity>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
