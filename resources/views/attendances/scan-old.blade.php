<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan | MyGunadarma</title>
    <!-- TailwindCSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Font Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        /* Template Warna */
        :root {
            --primary: #653f99;
            --primary-container: #E2D2E7;
            --secondary: ;
            --secondary-container: #FAF2FA;
            --teritary: #d7dadf;
            --teritary-container: #dbdee3;
            --error: ;
            --error-container: ;
            --surface-container: #f0f4f9;
            --surface-variant: #444746;
        }

        html,
        body {
            /* Set Font Roboto ke HTML */
            font-family: "Roboto", sans-serif;
            /* Biar ga geser kebawah semuanya */
            overflow: hidden;
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
                            alert('QR Code terdeteksi:\n\n' + data);
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
</head>

<body>
    <div id="app" class="relative min-h-dvh max-h-dvh flex flex-col">
        <!-- Video kamera -->
        <video id="preview" class="object-cover h-dvh w-dvw" autoplay playsinline></video>
        <!-- Overlay gelap dengan lubang tengah berbentuk kotak -->
        <div class="absolute inset-0 bg-black/60 pointer-events-none [padding-left:calc(50vw-(20rem/2))] [padding-top:calc(50vh-(20rem/2))] [padding-right:calc(50vw-(20rem/2))] [padding-bottom:calc(50vh-(20rem/2))] 2xl:[padding-left:calc(50vw-(30rem/2))] 2xl:[padding-top:calc(50vh-(30rem/2))] 2xl:[padding-right:calc(50vw-(30rem/2))] 2xl:[padding-bottom:calc(50vh-(30rem/2))]"
            style="
				-webkit-mask:
				linear-gradient(#000 0 0) content-box,
				linear-gradient(#000 0 0);
				-webkit-mask-composite: xor;
				mask-composite: exclude;
				">
        </div>
        <!-- Kotak bidikan -->
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
            <div class="relative w-80 h-80 2xl:w-120 2xl:h-120 border-2 border-white overflow-hidden">
                <!-- Garis pemindai bergerak -->
                <div class="absolute inset-x-0 top-0 h-px bg-red-600 animate-scan animate-pulse"></div>
            </div>
        </div>
        <!-- Tombol switch kamera -->
        <button onclick="switchCamera()"
            class="absolute bottom-6 right-6 flex 2xl:hidden flex-col justify-center items-center gap-3 bg-[var(--teritary)] hover:bg-[var(--teritary)]/50 focus:bg-[var(--teritary)]/50 active:bg-[var(--teritary-container)]/50 p-3 rounded-full transition duration-150 ease-in-out z-20">
            <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px"
                class="fill-[var(--surface-variant)]">
                <path
                    d="M480-75.93q-142.39 0-251.83-88.16-109.43-88.15-139.71-227.54h69.13q29.65 110.02 119.13 178.79Q366.2-144.07 480-144.07q94.36 0 174.02-47.86 79.65-47.87 124.65-130.57H653.89v-69.13H886.7v238.33h-67.37v-107.57q-57.24 86.33-146.76 135.63Q583.04-75.93 480-75.93ZM481-379q-42 0-72-30t-30-72q0-42 30-72t72-30q42 0 72 30t30 72q0 42-30 72t-72 30ZM73.3-569.37v-237.56h68.37v105.56q57.24-86.09 146.26-134.39 89.03-48.31 192.07-48.31 142.69 0 252.47 87.66 109.79 87.65 140.31 227.04h-69.37q-29.76-110.04-119.61-178.8-89.86-68.76-203.8-68.76-93.45 0-172.68 48.36-79.23 48.37-124.99 130.07h124.78v69.13H73.3Z" />
            </svg>
        </button>
    </div>
</body>

</html>
