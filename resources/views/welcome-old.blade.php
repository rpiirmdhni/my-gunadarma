<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | MyGunadarma</title>
    <!-- TailwindCSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Font Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
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
    <div id="app"
        class="bg-[url(/img/bg-login.png)] bg-no-repeat bg-center bg-cover min-h-dvh max-h-dvh flex flex-col">
        <div class="grid grid-rows-12 2xl:grid-cols-3 min-h-dvh max-h-dvh">
            <div class="row-span-9 2xl:row-span-12 2xl:col-span-2 w-full h-full"></div>
            <div
                class="row-span-3 2xl:row-span-12 2xl:col-span-1 bg-white rounded-t-4xl 2xl:rounded-t-none 2xl:rounded-l-4xl w-full h-full flex justify-center items-center p-4">
                <div
                    class="flex flex-col justify-center items-center gap-4 h-full w-full 2xl:w-md max-w-full 2xl:max-w-md">
                    <a href="/login"
                        class="bg-[var(--primary)] hover:bg-[var(--hover-primary)] focus:bg-[var(--focus-primary)] active:bg-[var(--active-primary)] text-white flex justify-center items-center w-full p-3 rounded-full transition duration-150 ease-in-out">
                        <span class="text-lg">Masuk</span>
                    </a>
                    <a href="/activation"
                        class="bg-[var(--primary-container)] hover:bg-[var(--hover-primary-container)] focus:bg-[var(--focus-primary-container)] active:bg-[var(--active-primary-container)] text-[var(--primary)] flex justify-center items-center w-full p-3 rounded-full transition duration-150 ease-in-out">
                        <span class="text-lg">Aktivasi Akun</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
